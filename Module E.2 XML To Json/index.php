<?php

$path = __DIR__ . "\contoh.xml";
$context = file_get_contents($path);
$xml = simplexml_load_string($context);
$json = json_encode($xml);

echo $json;
