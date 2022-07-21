<?php

/**
* Find books by title based on a pattern
*/
function find_book_by_title(\PDO $pdo, string $keyword): array
{
    $pattern = '%' . $keyword . '%';

    $sql = 'SELECT book_id, title 
        FROM books 
        WHERE title LIKE :pattern';

    $statement = $pdo->prepare($sql);
    $statement->execute([':pattern' => $pattern]);

    return  $statement->fetchAll(PDO::FETCH_ASSOC);
}

// connect to the database
$pdo = require 'connect.php';

// find books with the title matches 'es'
$books = find_book_by_title($pdo, 'as');

foreach ($books as $book) {
    echo $book['title'] . '<br>';
}
