<?php

// Script #2: Request access token with code,
// client_id, and client_secret.

// The code will be something like:
//   290feb71e36dda54ee199d8caffa4f1b
$code = $_GET['code'];

// We will post these fields to 23andMe.
$post_field_array = array(
  'client_id'     => '00000000000000000000000000000001',
  'client_secret' => '00000000000000000000000000000002',
  'grant_type'    => 'authorization_code',
  'code'          => $code,
  'redirect_uri'  => 'http://#.com/redirect/',
  'scope'         => 'basic genomes');

// Encode the field values for HTTP.
$post_fields = '';
foreach ($post_field_array as $key => $value)
  $post_fields .= "$key=" . urlencode($value) . '&';
$post_fields = rtrim($post_fields, '&');

// Use cURL to get the JSON response from 23andMe.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.23andme.com/token/');
curl_setopt($ch, CURLOPT_POST, count($post_field_array));
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$encoded_json = curl_exec($ch);

// The access token is returned via the 'access_token' key.
$response = json_decode($encoded_json, true);
//parse error? -> $access_token $response['access_token'];

// The access_token will be something like:
//   0d4d50f83f6c3538e3df74d593e74b96
print $access_token;
?>