<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Str;

class UuidTest extends TestCase
{
    public function test_is_valid_uuid()
    {
        $uuid = Str::isUuid(generateUUID());
        $this->assertEquals(true, $uuid);
    }
}
