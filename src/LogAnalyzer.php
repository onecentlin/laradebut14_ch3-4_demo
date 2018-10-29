<?php
declare(strict_types=1);

namespace Winnie\LaraDebut;

class LogAnalyzer
{
    private $manager;

    public function __construct(IExtensionManager $mgr)
    {
        $this->manager = $mgr;
    }

    public function isValidLogFileName(string $fileName) : bool
    {
        return $this->manager->isValid($fileName);
    }
}
