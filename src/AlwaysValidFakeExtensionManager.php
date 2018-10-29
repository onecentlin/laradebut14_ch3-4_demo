<?php declare(strict_types=1);

namespace Winnie\LaraDebut;

class AlwaysValidFakeExtensionManager implements IExtensionManager
{
    public function isValid(string $fileName): bool
    {
        return true;
    }
}