<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\ValueObject;

use PHPUnit\Framework\TestCase;

class LengthTest extends TestCase
{
    public function testLengthEquals()
    {
        $length1 = new Length(101);
        $length2 = new Length(101);

        $this->assertTrue($length1->equals($length2));
    }

    public function testLengthNotEquals()
    {
        $length1 = new Length(101);
        $length2 = new Length(102);

        $this->assertFalse($length1->equals($length2));
    }

    public function testLengthNotEqualsWhenWrongInstance()
    {
        $length = new Length(10);
        $width = new Width(10);

        $this->assertFalse($length->equals($width));
    }

    public function testLengthToString()
    {
        $length = new Length(100);
        $this->assertSame('100', (string) $length);
    }
}
