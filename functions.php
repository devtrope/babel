<?php

function generatePage(array $alphabet): array
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

function generateBookTitle(array $alphabet): string
{
    $result = '';
    $titleLength = rand(5, 30);

    for ($i = 0; $i < $titleLength; $i++) {
        $result .= $alphabet[rand(0, count($alphabet) - 1)];
    }

    return $result;
}

function nextHexagonNumber(?string $lastLocation): string
{
    if ($lastLocation === null) {
        return '0';
    }

    $alphabet = '0123456789abcdefghijklmnopqrstuvwxyz';
    $base = strlen($alphabet);

    $chars = str_split($lastLocation);
    $index = count($chars) - 1;

    while ($index >= 0) {
        $pos = strpos($alphabet, $chars[$index]);

        if ($pos === false) {
            throw new Exception("Caractère invalide détecté.");
        }

        if ($pos === $base - 1) {
            $chars[$index] = '0';
            $index--;
        } else {
            $chars[$index] = $alphabet[$pos + 1];
            return implode('', $chars);
        }
    }

    array_unshift($chars, '0');

    return implode('', $chars);
}