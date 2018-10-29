<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Winnie\LaraDebut\LogAnalyzer2;

class LogAnalyzer2Test extends TestCase
{
    /** @test */
    public function analyze_WebServiceThrows_SendsEmail()
    {
        $stubService = new FakeWebService();
        $stubService->toThrow = new \Exception("fake exception");
        $mockEmail = new FakeEmailService();

        $log = new LogAnalyzer2($stubService, $mockEmail);

        $tooShortFileName = "abc.ext";
        $log->analyze($tooShortFileName);

        $this->assertContains("someone@shomewhere.com", $mockEmail->to);
        $this->assertContains("fake exception", $mockEmail->body);
        $this->assertContains("can't log", $mockEmail->subject);
    }
}
