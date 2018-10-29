<?php
declare(strict_types=1);

namespace Winnie\LaraDebut;

class FileExtensionManager implements IExtensionManager
{
    public function isValid(string $fileName): bool
    {
        if ($fileName === "") {
            throw new \Exception("filename has to be provided");
        }

        if (strcasecmp(substr($fileName, -4), ".SLF") !== 0) {
            return false;
        }

        return true;
    }
}