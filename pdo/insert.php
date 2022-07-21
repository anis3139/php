<?php

$pdo = require_once 'connect.php';

$names = [
    'Penguin/Random House',
    'Hachette Book Group',
    'Harper Collins',
    'Simon and Schuster'
];

$sql = 'INSERT INTO publishers(name) VALUES(:name)';

$statement = $pdo->prepare($sql);

foreach ($names as $name) {
    $statement->execute([
        ':name' => $name
    ]);
}

$publisher_id = $pdo->lastInsertId();

echo 'The publisher id ' . $publisher_id . ' was inserted'."<br>";

$books=[
    [
        'title'=>'devdas',
        'isbn'=>'420sbn',
    ],
    [
        'title'=>'bindas',
        'isbn'=>'420sbn',
    ],
    [
        'title'=>'shesher kabita',
        'isbn'=>'420sbn',
    ],
    [
        'title'=>'agher kabita',
        'isbn'=>'420sbn',
    ],
];


$sql = 'INSERT INTO books(title, isbn, publisher_id) VALUES(:title, :isbn, :publisher_id)';

$statement = $pdo->prepare($sql);

foreach ($books as $key=>$book) {
    $statement->bindValue(':title', $book['title']);
    $statement->bindValue(':isbn', $book['isbn']);
    $statement->bindValue(':publisher_id', $publisher_id-rand(0, 3));
    $statement->execute();
}
 

echo 'The Book was inserted';
