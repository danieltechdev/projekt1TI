<?php

$dbhost = "localhost:3305";
$dbuser = "root";
$dbpass = "okno";
$dbname = "projekt1bd";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname) or die("Connect failed: %s\n". $conn -> error);


// Sprawdzenie połączenia


// Pobranie danych z formularza
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashowanie hasła
$email = $_POST['email'];
$address = $_POST['address'];
$education = $_POST['education'];
$interests = implode(", ", $_POST['interests']); // Konwersja tablicy zainteresowań na string

// Zapytanie SQL do zapisu danych
$sql = "INSERT INTO users (firstName, lastName, username, password, email, address, education, interests)
        VALUES ('$firstName', '$lastName', '$username', '$password', '$email', '$address', '$education', '$interests')";

if ($conn->query($sql) === TRUE) {
    echo "Rejestracja zakończona pomyślnie";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "<h2>Zapisane dane:</h2>";
echo "<ul>";
echo "<li>Imię: " . htmlspecialchars($firstName) . "</li>";
echo "<li>Nazwisko: " . htmlspecialchars($lastName) . "</li>";
echo "<li>Unikalny login: " . htmlspecialchars($username) . "</li>";
echo "<li>E-mail: " . htmlspecialchars($email) . "</li>";
echo "<li>Adres: " . htmlspecialchars($address) . "</li>";
echo "<li>Wykształcenie: " . htmlspecialchars($education) . "</li>";
echo "<li>Zainteresowania: " . htmlspecialchars($interests) . "</li>";
echo "</ul>";


// Zamknięcie połączenia
$conn->close();
?>
