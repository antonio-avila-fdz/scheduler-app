<?php

namespace Tests\Unit;

use Tests\TestCase;

class SendMailCommandTest extends TestCase
{
    /**
     * Test command output and exit code
     */
    public function test_command_ouput_contains_action_description(): void
    {
        $this->artisan('send:mail')
            ->expectsOutputToContain('I will send mails')
            ->assertExitCode(0);
    }
}
