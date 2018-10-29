<?php declare(strict_types=1);

namespace Tests;

use Winnie\LaraDebut\IExtensionManager;

class FakeExtensionManager implements IExtensionManager
{
    public $willBeValid = false;
    /** @var \Exception */
    public $willThrow = null;

    public function isValid(string $fileName): bool
    {
        if ($this->willThrow != null) {
            throw $this->willThrow;
        }
        return $this->willBeValid;
    }
}