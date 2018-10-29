<?php declare(strict_types=1);

namespace Winnie\LaraDebut;

interface IEmailService
{
    public function sendEmail(string $to, string $subject, string $body);
}