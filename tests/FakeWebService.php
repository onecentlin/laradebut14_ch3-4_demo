<?php declare(strict_types=1);

namespace Tests;

use Winnie\LaraDebut\IWebService;

class FakeWebService implements IWebService
{
    public $lastError;

    public function logError(string $message)
    {
        $this->lastError = $message;
    }
}