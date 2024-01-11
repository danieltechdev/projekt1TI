<?php
try {
    $db = new PDO('sqlite:mydatabase.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->exec('CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY,
        firstName TEXT NOT NULL,
        lastName TEXT NOT NULL,
        username TEXT UNIQUE NOT NULL,
        password TEXT NOT NULL,
        email TEXT UNIsQUE NOT NULL,
        address TEXT NOT NULL,
        education TEXT NOT NULL,
        interests TEXT
    )');
    
    echo "Baza danych i tabela utworzone pomyślnie.";
} catch (PDOException $e) {
    die('Błąd: ' . $e->getMessage());
}
?>
