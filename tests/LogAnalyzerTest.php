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
}
