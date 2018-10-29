<?php declare(strict_types=1);

namespace Tests;

use Winnie\LaraDebut\IEmailService;

class FakeEmailService implements IEmailService
{
    /**
     * @var string
     */
    public $to;
    /**
     * @var string
     */
    public $subject;
    /**
     * @var string
     */
    public $body;

    public function sendEmail(string $to, string $subject, string $body)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->body = $body;
    }
}