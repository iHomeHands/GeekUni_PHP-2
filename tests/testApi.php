<?php

require_once 'APIRequest.php';

class testSample extends PHPUnit_Framework_TestCase
{
    public function test_feedbackFormNoData()
    {
        $errorResponse = '{"status":"error","message":"Please, fill required fields"}';
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
