<?php
function query($pdo, $sql, $parameters = []) {
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function allJokes($pdo) {
    $jokes = query($pdo, 'SELECT joke.id, joketext, name, email, categoryName
                          FROM joke
                          INNER JOIN author ON authorid = author.id
                          INNER JOIN category ON categoryid = category.id');
    return $jokes->fetchAll();
}


function totalJokes($pdo) {
    $query = query($pdo, 'SELECT COUNT(*) FROM joke');
    $row = $query->fetch();
    return $row[0];
}

function getJoke($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM joke WHERE id = :id', $parameters);
    return $query->fetch();
}

function deleteJoke($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM joke WHERE id = :id', $parameters);
}

function updateJoke($pdo, $id, $joketext) {
    $parameters = [':id' => $id, ':joketext' => $joketext];
    query($pdo, 'UPDATE joke SET joketext = :joketext WHERE id = :id', $parameters);
}

function insertJoke($pdo, $joketext, $authorid, $categoryid, $imagePath = null) {
    $parameters = [
        ':joketext' => $joketext,
        ':authorid' => $authorid,
        ':categoryid' => $categoryid,
        ':imagePath' => $imagePath
    ];
    query($pdo, 
        'INSERT INTO joke (joketext, jokedate, authorid, categoryid, imagePath)
         VALUES (:joketext, CURDATE(), :authorid, :categoryid, :imagePath)',
        $parameters
    );
}
?>
