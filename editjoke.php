<?php
include __DIR__ . '/includes/DatabaseConnection.php';
include __DIR__ . '/includes/DatabaseFunctions.php';

try {
    if (isset($_POST['jokeid'])) {

        updateJoke($pdo, $_POST['jokeid'], $_POST['joketext']);

        header('Location: jokes.php');
        exit();
    } elseif (isset($_GET['id'])) {

        $joke = getJoke($pdo, $_GET['id']);

        if (!$joke) {
            throw new Exception('Joke not found');
        }

        $title = 'Edit joke';
        ob_start();
        include __DIR__ . '/templates/editjoke.html.php';
        $output = ob_get_clean();
    } else {
        throw new Exception('No joke ID provided');
    }
} catch (Exception $e) {
    $title = 'Error editing joke';
    $output = 'Error editing joke: ' . $e->getMessage();
}

include __DIR__ . '/templates/layout.html.php';
?>
