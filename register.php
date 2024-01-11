<?php
// Połączenie z bazą danych (przykładowe dane, dostosuj do własnych ustawień)
$servername = "localhost";
$username = "root";
$password = "okno";
$dbname = "projekt1db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pobranie danych z formularza
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];
$address = $_POST['address'];
$education = $_POST['education'];
$interests = implode(", ", $_POST['interests']);

// Wstawienie danych do bazy danych
$sql = "INSERT INTO users (firstName, lastName, username, password, email, address, education, interests)
        VALUES ('$firstName', '$lastName', '$username', '$password', '$email', '$address', '$education', '$interests')";

if ($conn->query($sql) === TRUE) {
    echo "Rejestracja zakończona pomyślnie. Zapisane dane:<br>";
    echo "Imię: $firstName<br>";
    echo "Nazwisko: $lastName<br>";
    echo "Login: $username<br>";
    echo "E-mail: $email<br>";
    echo "Adres: $address<br>";
    echo "Wykształcenie: $education<br>";
    echo "Zainteresowania: $interests<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
