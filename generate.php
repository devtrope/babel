<?php

require_once 'bdd.php';
require_once 'functions.php';

$letters = range('a', 'z');
$specialChars = [' ', ',', '.'];
$alphabet = array_merge($letters, $specialChars);

$i = 0;

while ($i < 50) {
    $lastLocation = null;
    
    $req = $bdd->prepare('SELECT location FROM books ORDER BY id DESC LIMIT 1');
    $req->execute([]);
    $data = $req->fetch(PDO::FETCH_ASSOC);
    
    if ($data) {
        $lastLocation = $data['location'];
    }
    
    $hexagonNumber = nextHexagonNumber($lastLocation);

    $wall = 1;

    while ($wall <= 4) {
        $shelf = 1;

        while ($shelf <= 5) {
            $volume = 1;
            
            while ($volume <= 32) {
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

                $numberPages = 1;

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
            
            $shelf++;
        }
        
        $wall++;
    }

    $i++;
}
