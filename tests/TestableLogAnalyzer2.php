<?php declare(strict_types=1);

namespace Tests;

class TestableLogAnalyzer2 extends LogAnalyzerUsingFactoryMethod2
{
    public $isSupported;

    protected function isValid(string $fileName): bool
    {
        // 回傳測試程式中所設定的假值
        return $this->isSupported;
    }
}