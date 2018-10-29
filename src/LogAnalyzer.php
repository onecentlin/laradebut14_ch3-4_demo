<?php
declare(strict_types=1);

namespace Winnie\LaraDebut;

class LogAnalyzer
{
    /** @var IExtensionManager */
    private $manager;
    /** @var IWebService */
    private $service;

    public function __construct(IWebService $service = null)
    {
        // 在產品程式中使用工廠類別
        $this->manager = ExtensionManagerFactory::create();

        $this->service = $service;
    }

    public function isValidLogFileName(string $fileName) : bool
    {
        return $this->manager->isValid($fileName);
    }

    public function analyze(string $fileName)
    {
        // 在產品程式中記錄檔名過短的錯誤
        if (strlen($fileName) < 8) {
            $this->service->logError("Filename too short: {$fileName}");
        }
    }
}
