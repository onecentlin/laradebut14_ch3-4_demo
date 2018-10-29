<?php declare(strict_types=1);

namespace Tests;

use Winnie\LaraDebut\IWebService;

class FakeWebService implements IWebService
{
    public $lastError;
    public $toThrow;

    public function logError(string $message)
    {
        if ($this->toThrow != null) {
            throw $this->toThrow;
        }

        $this->lastError = $message;
    }
}