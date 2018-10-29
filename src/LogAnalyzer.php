<?php
declare(strict_types=1);

namespace Winnie\LaraDebut;

class LogAnalyzer
{
    /** @var IExtensionManager */
    private $manager;

    public function __construct()
    {
        // 在產品程式中使用工廠類別
        $this->manager = ExtensionManagerFactory::create();
    }

    public function isValidLogFileName(string $fileName) : bool
    {
        return $this->manager->isValid($fileName);
    }
}
