<?php

if (! isset($_GET['location'])) {
    //Generate the book location in the library
    $bookLocation = generateBookLocation();
    header('Location: index.php?location=' . $bookLocation . '&page=1');
    exit(300);
}

$bookLocation = $_GET['location'];

if (! isset($_GET['page']) || ! is_numeric($_GET['page']) || $_GET['page'] < 1 || $_GET['page'] > 410) {
    header('Location: index.php?location=' . $bookLocation . '&page=1');
    exit(300);
}

$currentPage = $_GET['page'];

$letters = range('a', 'z');
$specialChars = [' ', ',', '.'];
$alphabet = array_merge($letters, $specialChars);

$bookTitle = generateBookTitle($alphabet);

$page = generatePage($alphabet);
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
    $titleLength = rand(5, 15);

    for ($i = 0; $i < $titleLength; $i++) {
        $result .= $alphabet[rand(0, count($alphabet) - 1)];
    }

    return $result;
}

function generateBookLocation(): string
{
    $volumeNumber = rand(1, 32);
    $shelfNumber = rand(1, 5);
    $wallNumber = rand(1, 4);
    $hexagonNumber = generateHexagonNumber();

    return $hexagonNumber . '-w' . $wallNumber . '-s' . $shelfNumber . '-v' . $volumeNumber;
}

function generateHexagonNumber(): string
{
    $result = '';
    $resultLength = rand(5, 15);
    $letters = range('a', 'z');
    $numbers = range(0, 9);
    $base36 = array_merge($letters, $numbers);

    for ($i = 0; $i < $resultLength; $i++) {
        $result .= $base36[rand(0, count($base36) - 1)];
    }

    return $result;
}