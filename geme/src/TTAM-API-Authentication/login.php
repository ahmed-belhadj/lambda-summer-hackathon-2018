<?php

// Script #1: Redirect to 23andMe with client_id.

$client_id    = '00000000000000000000000000000001';
$redirect_uri = 'http://#.com/redirect/';

header("Location: https://api.23andme.com/authorize/"
     . "?redirect_uri=$redirect_uri"
     . "&response_type=code"
     . "&client_id=$client_id"
     . "&scope=basic+genomes");
?>