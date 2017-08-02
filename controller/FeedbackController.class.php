<?php

class FeedbackController extends Controller
{
    public $view = 'feedback';

    public function index($data)
    {
        if (empty($data)) {
            $return = [];
            $return['status'] = 'error';
            $return['message'] = 'Please, fill required fields';
            return $return;
        } else {
            $requiredFields = ['phone', 'email', 'name', 'message'];
            if (@json_decode($data['data']) === null) {
                $data = @json_encode($data['data']);
            }
            $data = @json_decode($data);

            foreach ($requiredFields as $field) {
                if (!isset($data->$field) || empty($data->$field)) {
                    $return = [];
                    $return['status'] = 'error';
                    $return['message'] = 'Please, fill required fields ' . $field;
                    return $return;
                } else {
                    switch ($field) {
                        case 'email':
                            if (!strstr($data->$field, '@')) {
                                $return = [];
                                $return['status'] = 'error';
                                $return['message'] = 'Incorrect email';
                                return $return;
                            }
                            break;
                    }
                }
            }
            return ['status' => 'ok'];
        }
    }
}
