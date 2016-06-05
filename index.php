<?php
require 'autoload.php';

$urls = [
    'http://www.apple.com',
    'http://php.net',
    'http://sdfss55555dwerw.org'
];
$scanner = new \src\Scanner($urls);
print_r($scanner->getInvalidUrls());