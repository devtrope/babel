<?php

require_once 'bdd.php';
require_once 'functions.php';

$bookLocation = $_GET['location'];
$bookLocationArray = explode('-', $bookLocation);
$currentPage = $_GET['page'];

$location = $bookLocationArray[0];
$wall = str_replace('w', '', $bookLocationArray[1]);
$shelf = str_replace('s', '', $bookLocationArray[2]);
$volume = str_replace('v', '', $bookLocationArray[3]);

$book = $bdd->prepare('SELECT id, title FROM books WHERE location = :location AND wall = :wall AND shelf = :shelf AND volume = :volume');
$book->execute([
    'location' => $location,
    'wall' => $wall,
    'shelf' => $shelf,
    'volume' => $volume
]);
$data = $book->fetch(PDO::FETCH_ASSOC);

$page = $bdd->prepare('SELECT content FROM pages WHERE book_id = :book_id AND page = :page');
$page->execute([
    'book_id' => $data['id'],
    'page' => $currentPage
]);

$bookTitle = $data['title'];
$pageContent = $page->fetch(PDO::FETCH_ASSOC)['content'];