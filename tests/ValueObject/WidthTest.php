<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\ValueObject;

use PHPUnit\Framework\TestCase;

class WidthTest extends TestCase
{
    public function testWidthEquals()
    {
        $width1 = new Width(101);
        $width2 = new Width(101);

        $this->assertTrue($width1->equals($width2));
    }

    public function testWidthNotEquals()
    {
        $width1 = new Width(101);
        $width2 = new Width(102);

        $this->assertFalse($width1->equals($width2));
    }

    public function testWidthNotEqualsWhenWrongInstance()
    {
        $width = new Width(10);
        $length = new Length(10);

        $this->assertFalse($width->equals($length));
    }

    public function testWidthToString()
    {
        $width = new Width(100);
        $this->assertSame('100', (string) $width);
    }
}
