<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
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

        // 注入虛設常式
        $this->analyzer->setManager($myFakeManager);

        $result = $this->analyzer->isValidLogFileName("short.ext");
        $this->assertTrue($result);
    }

    /**
     * @test
     * @expectedException  \Exception
     */
    public function isValidFileName_ExtManagerThrowsException_ReturnsFalse()
    {
        // 3.4.4: 用假物件來摸擬異常 (p.74)
        $myFakeManager = new FakeExtensionManager();
        $myFakeManager->willBeValid = false;
        $myFakeManager->willThrow = new \Exception("this is fake");

        $this->analyzer->setManager($myFakeManager);
        $result = $this->analyzer->isValidLogFileName("anything.anyextension");
        $this->assertFalse($result);
    }
}
