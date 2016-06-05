<?php
require 'vendor/autoload.php';

// URLs file
define(URLS_FILE, 'url.csv');

// Instantiate Guzzle HTTP client
$client = new \GuzzleHttp\Client();

// Open and iterate CSV
$csv = \League\Csv\Reader::createFromFileObject(new SplFileObject(URLS_FILE));
foreach ($csv as $csvRow) {
    try {
        // Send HTTP options request
        $response = $client->options($csvRow[0]);

        // Inspect response status code
        if ($response->getStatusCode() >= 400) {
            throw new \Exception();
        }

        // Headers output
        var_dump($response->getHeaders());
    } catch (\Exception $e) {
        // Send bad URLs to standart out
        echo $csvRow[0] . PHP_EOL;
    }
}