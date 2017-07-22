<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class webAppTest extends TestCase
{
    public function test_testWebApp()
    {
        $content = file_get_contents('http://localhost/index.php?url=123');
        $this->assertEquals('123', $content);
    }
}
