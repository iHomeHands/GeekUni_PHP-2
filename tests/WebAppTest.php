<?php

declare(strict_types=1);

require_once  __DIR__ . '/../lib/autoload.php';

use PHPUnit\Framework\TestCase;

class webAppTest extends TestCase
{
    public function test_testWebApp()
    {
        $content = file_get_contents('http://'.Config::get('server_url').'/index.php?page=admin');
        $this->assertTrue(strpos($content, '<!DOCTYPE html>') === 0);
    }
}
