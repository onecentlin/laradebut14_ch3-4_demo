<?php declare(strict_types=1);

namespace Tests;

use Winnie\LaraDebut\FileExtensionManager;
use Winnie\LaraDebut\IExtensionManager;

class LogAnalyzerUsingFactoryMethod
{
    public function isValidLogFileName(string $fileName) : bool
    {
        // 使用虛擬的 getManager() 方法
        return $this->getManager()->isValid($fileName);
    }

    protected function getManager() : IExtensionManager
    {
        // 回傳寫死的值
        return new FileExtensionManager();
    }
}