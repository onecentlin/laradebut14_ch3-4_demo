<?php
declare(strict_types=1);

namespace Winnie\LaraDebut;

class LogAnalyzer
{
    public function isValidLogFileName(string $fileName) : bool
    {
        $mgr = new FileExtensionManager();
        return $mgr->isValid($fileName);
    }
}
