<?php declare(strict_types=1);

namespace Tests;

use Winnie\LaraDebut\FileExtensionManager;

class LogAnalyzerUsingFactoryMethod2
{
    public function isValidLogFileName(string $fileName) : bool
    {
        return $this->isValid($fileName);
    }

    protected function isValid(string $fileName) : bool
    {
        $mgr = new FileExtensionManager();

        // 回傳真實相依物件的結果
        return $mgr->isValid($fileName);
    }
}