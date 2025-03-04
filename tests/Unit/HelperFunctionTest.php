<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelperFunctionTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_helper_timezones_function_exists(): void
    {
        $function_exists = function_exists('getTimeZonesByHour');

        $this->assertTrue($function_exists);
    }

    /**
     * Test function return
     */
    public function test_helper_timezones_function_returns_array(): void
    {
        $timezones = getTimeZonesByHour(12);

        $this->assertIsArray($timezones);
    }
}
