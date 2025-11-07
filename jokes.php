<?php
try {
    include __DIR__ . '/includes/DatabaseConnection.php';
    include __DIR__ . '/includes/DatabaseFunctions.php';


    $totalJokes = totalJokes($pdo);


    $jokes = query($pdo, 
        'SELECT joke.id AS joke_id, joketext, jokedate, imagePath, 
                author.name, author.email, category.category_name
         FROM joke
         INNER JOIN author ON author.id = joke.authorid
         INNER JOIN category ON category.id = joke.categoryid
         ORDER BY jokedate DESC'
    )->fetchAll();

    $title = 'Jokes List';

    ob_start();
    include __DIR__ . '/templates/jokes.html.php';
    $output = ob_get_clean();
} 
catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include __DIR__ . '/templates/layout.html.php';
?>
