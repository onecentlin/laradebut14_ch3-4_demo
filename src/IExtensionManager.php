<?php declare(strict_types=1);

namespace Winnie\LaraDebut;

interface IExtensionManager
{
    public function isValid(string $fileName): bool;
}