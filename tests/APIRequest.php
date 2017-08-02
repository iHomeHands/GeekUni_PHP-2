<?php
function APIRequest($url, $fields, $method)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://localhost/' . $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    $postData = [];
    $data = json_encode($fields);

    curl_setopt($curl, CURLOPT_POSTFIELDS, 'data='.$data);
    $out = curl_exec($curl);
    curl_close($curl);
    return $out;
}
