<?php
try {
    include __DIR__ . '/includes/DatabaseConnection.php';

    if (isset($_POST['joketext']) && $_POST['joketext'] != '') {

        $sql = 'INSERT INTO joke (joketext, jokedate, authorid, categoryid)
                VALUES (:joketext, CURDATE(), :authorid, :categoryid)';

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':joketext', $_POST['joketext']);
        $stmt->bindValue(':authorid', $_POST['author']);
        $stmt->bindValue(':categoryid', $_POST['category']);
        $stmt->execute();

        header('Location: jokes.php');
        exit();
    } 
    else {
        $sql_a = 'SELECT id, name FROM author';
        $authors = $pdo->query($sql_a);

        $sql_c = 'SELECT id, category_name FROM category';
        $categories = $pdo->query($sql_c);

        $title = 'Add a new joke';

        ob_start();
        include __DIR__ . '/templates/addjoke.html.php';
        $output = ob_get_clean();
    }
} 
catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include __DIR__ . '/templates/layout.html.php';
?>
<?php
try {
    include __DIR__ . '/includes/DatabaseConnection.php';
    include __DIR__ . '/includes/DatabaseFunctions.php';

    if (isset($_POST['joketext']) && $_POST['joketext'] != '') {

        insertJoke($pdo, $_POST['joketext'], $_POST['author'], $_POST['category']);
        header('Location: jokes.php');
        exit();
    } 
    else {
        $authors = query($pdo, 'SELECT id, name FROM author')->fetchAll();

        $categories = query($pdo, 'SELECT id, category_name FROM category')->fetchAll();

        $title = 'Add a new joke';

        ob_start();
        include __DIR__ . '/templates/addjoke.html.php';
        $output = ob_get_clean();
    }
} 
catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include __DIR__ . '/templates/layout.html.php';
?>
