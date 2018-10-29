<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Winnie\LaraDebut\ExtensionManagerFactory;
use Winnie\LaraDebut\LogAnalyzer;

class LogAnalyzerTest extends TestCase
{
    /** @var LogAnalyzer */
    private $analyzer;

    protected function setUp()
    {
        $this->analyzer = new LogAnalyzer();
    }

    /**
     * @test
     * @dataProvider  provideFileData
     */
    public function isValidLogFileName_VariousExtensions_ChecksThem(string $file, bool $expected)
    {
        $result = $this->analyzer->isValidLogFileName($file);
        $this->assertEquals($expected, $result);
    }

    public function provideFileData()
    {
        return [
            ["filewithgoodextension.SLF", true],
            ["filewithgoodextension.slf", true],
            ["filewithbadextension.foo", false]
        ];
    }

    /**
     * @test
     * @expectedException  \Exception
     */
    public function isValidFileName_EmptyFileName_ThrowsException()
    {
        $result = $this->analyzer->isValidLogFileName("");
    }

    /** @test */
    public function isValidFileName_NameSupportedExtension_ReturnsTrue()
    {
        // 準備一個回傳 true 的虛設常式物件
        $myFakeManager = new FakeExtensionManager();
        $myFakeManager->willBeValid = true;

        // 為這個測試案例設定虛設常式，並注入工廠類別中
        ExtensionManagerFactory::setManager($myFakeManager);

        $log = new LogAnalyzer();
        $result = $log->isValidLogFileName("short.ext");
        $this->assertTrue($result);
    }

    /** @test */
    public function overrideTest()
    {
        $stub = new FakeExtensionManager();
        $stub->willBeValid = true;

        // 初始化繼承自被測試類別的衍生類別物件
        $logan = new TestableLogAnalyzer($stub);
        $result = $logan->isValidLogFileName("file.ext");

        $this->assertTrue($result);
    }
}
