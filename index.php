<?php

$letters = range('a', 'z');
$specialChars = [' ', ',', '.'];
$alphabet = array_merge($letters, $specialChars);

$page = generatePage($alphabet);

foreach ($page as $line) {
    echo implode('', $line) . '<br/>';
}

function generatePage(array $alphabet)
{
    $result = [];
    $lines = 0;

    while ($lines < 40) {
        $result[$lines] = [];
        $characters = 0;

        while ($characters < 80) {
            $result[$lines][] = $alphabet[rand(0, count($alphabet) - 1)];
            $characters++;
        }

        $lines++;
    }

    return $result;
}