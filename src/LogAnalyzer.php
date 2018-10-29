<?php
declare(strict_types=1);

namespace Winnie\LaraDebut;

class LogAnalyzer
{
    /** @var IExtensionManager */
    private $manager;

    public function __construct()
    {
        $this->manager = new FileExtensionManager();
    }

    public function isValidLogFileName(string $fileName) : bool
    {
        return $this->manager->isValid($fileName);
    }

    /**
     * @return IExtensionManager
     */
    public function getManager(): IExtensionManager
    {
        return $this->manager;
    }

    /**
     * @param IExtensionManager $manager
     */
    public function setManager(IExtensionManager $manager)
    {
        $this->manager = $manager;
    }
}
