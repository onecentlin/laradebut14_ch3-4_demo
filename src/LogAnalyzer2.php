<?php declare(strict_types=1);

namespace Winnie\LaraDebut;

class LogAnalyzer2
{
    /**
     * @var IWebService
     */
    private $service;
    /**
     * @var IEmailService
     */
    private $email;

    public function __construct(IWebService $service, IEmailService $email)
    {
        $this->service = $service;
        $this->email = $email;
    }

    public function analyze(string $fileName)
    {
        if (strlen($fileName) < 8) {
            try {
                $this->service->logError("Filename too short: {$fileName}");
            } catch (\Exception $e) {
                $this->email->sendEmail("someone@shomewhere.com", "can't log", $e->getMessage());
            }
        }
    }
}