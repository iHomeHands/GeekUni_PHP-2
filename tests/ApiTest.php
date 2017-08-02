<?php
declare(strict_types=1);

require_once 'autoload.php';

require_once 'APIRequest.php';

use PHPUnit\Framework\TestCase;

class testSample extends TestCase
{
    public function test_feedbackFormNoData()
    {
        $errorResponse = '{"status":"error","message":"Please, fill required fields"}';
        var_dump(APIRequest('api/feedback', [], 'POST'));
        die;
        $this->assertEquals($errorResponse, APIRequest('/api/feedback', [], 'POST'));
    }

    public function test_feedbackFormWrongEmail()
    {
        $errorResponse = '{"status":"error","message":"Incorrect email"}';
        $this->assertEquals($errorResponse, APIRequest('/api/feedback', ['email'=>'test', 'name' =>' my name', 'message'=>'test','phone'=>1235], 'POST'));
    }

    public function test_feedbackFormSuccess()
    {
        $successResponse = '{"status":"ok"}';
        $this->assertEquals(
            $successResponse,
            APIRequest(
                '/api/feedback',
                [
                    'email'=>'test@test.test',
                    'name' =>'my name',
                    'phone' => '+71234567890',
                    'message' => 'Hello, guys!'
                ],
                'POST'
            )
        );
    }
}
