<?php declare(strict_types=1);

namespace Tests;

use Winnie\LaraDebut\IExtensionManager;

class FakeExtensionManager implements IExtensionManager
{
    public $willBeValid = false;

    public function isValid(string $fileName): bool
    {
        return $this->willBeValid;
    }
}