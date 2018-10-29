<?php declare(strict_types=1);

namespace Tests;

use Winnie\LaraDebut\IExtensionManager;

class TestableLogAnalyzer extends LogAnalyzerUsingFactoryMethod
{
    /**
     * @var FakeExtensionManager
     */
    private $manager;

    public function __construct(IExtensionManager $mgr)
    {
        $this->manager = $mgr;
    }

    protected function getManager(): IExtensionManager
    {
        // 回傳你指定的值
        return $this->manager;
    }
}