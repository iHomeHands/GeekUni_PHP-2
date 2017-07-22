<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;


class sampleTest extends TestCase
{
    public function test_firstTest()
    {
        $a = true;
        $this->assertTrue($a);
    }

    protected function getNumber($a)
    {
        if ($a < 0) {
            $a *= -1;
        }
        return $a;
    }

    public function test_testNumbers()
    {
        $this->assertGreaterThanOrEqual(0, $this->getNumber(-43));
    }
}
