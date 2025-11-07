<?php
include __DIR__ . '/includes/DatabaseConnection.php';
include __DIR__ . '/includes/DatabaseFunctions.php';

try {
    if (isset($_POST['id'])) {
        deleteJoke($pdo, $_POST['id']);
        header('Location: jokes.php');
        exit();
    }
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include __DIR__ . '/templates/layout.html.php';
?>
