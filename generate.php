<?php

require_once 'bdd.php';
require_once 'functions.php';

$letters = range('a', 'z');
$specialChars = [' ', ',', '.'];
$alphabet = array_merge($letters, $specialChars);

$req = $bdd->prepare('SELECT id, location, wall, shelf, volume FROM books ORDER BY id DESC LIMIT 1');
$req->execute([]);
$lastBook = $req->fetch(PDO::FETCH_ASSOC);

$hexagonNumber = '0';
$wall = 1;
$shelf = 1;
$volume = 1;
$lastPage = 0;

if ($lastBook) {
    $hexagonNumber = $lastBook['location'];
    $wall = $lastBook['wall'];
    $shelf = $lastBook['shelf'];
    $volume = $lastBook['volume'];

    $req = $bdd->prepare('SELECT MAX(page) AS lastPage FROM pages WHERE book_id = :book_id');
    $req->execute(['book_id' => $lastBook['id']]);
    $lastPage = $req->fetch(PDO::FETCH_ASSOC)['lastPage'] ?? 0;
}

$i = 0;

while ($i < 50) {
    while ($wall <= 4) {
        while ($shelf <= 5) {
            while ($volume <= 32) {
                if ($lastPage == 0) {
                    $bookTitle = generateBookTitle($alphabet);

                    $ins = $bdd->prepare('INSERT INTO books (location, wall, shelf, volume, title) VALUES (:location, :wall, :shelf, :volume, :title)');
                    $ins->execute([
                        'location' => $hexagonNumber,
                        'wall' => $wall,
                        'shelf' => $shelf,
                        'volume' => $volume,
                        'title' => $bookTitle
                    ]);
    
                    $req = $bdd->prepare('SELECT id FROM books ORDER BY id DESC LIMIT 1');
                    $req->execute([]);
                    $data = $req->fetch(PDO::FETCH_ASSOC);
                } else {
                    $data = $lastBook;
                }
                
                $bookId = $data['id'];
                $numberPages = $lastPage + 1;
                $lastPage = 0;

                while ($numberPages <= 410) {
                    $page = generatePage($alphabet);
                    $content = '';
    
                    foreach ($page as $line) {
                        $content .= implode('', $line) . PHP_EOL;
                    }

                    $ins = $bdd->prepare('INSERT INTO pages (book_id, page, content) VALUES (:book_id, :page, :content)');
                    $ins->execute([
                        'book_id' => $data['id'],
                        'page' => $numberPages,
                        'content' => $content
                    ]);

                    $numberPages++;
                }
                
                $volume++;
            }
            
            $volume = 1;
            $shelf++;
        }
        
        $shelf = 1;
        $wall++;
    }

    $hexagonNumber = nextHexagonNumber($hexagonNumber);
    $wall = 1;
    $shelf = 1;
    $volume = 1;
    
    $i++;
}
