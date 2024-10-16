<?php
$servername = "localhost";
$username = "root"; // замените на ваше имя пользователя
$password = ""; // замените на ваш пароль
$dbname = "oprosnik_db";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Получение данных из формы
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gname = $_POST['gname'];
$math = $_POST['math'];
$history = $_POST['history'];
$physics = $_POST['physics'];
$chemistry = $_POST['chemistry'];
$biology = $_POST['biology'];

// Подготовка и выполнение SQL-запроса
$stmt = $conn->prepare("INSERT INTO responses (fname, lname, gname, math, history, physics, chemistry, biology) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $fname, $lname, $gname, $math, $history, $physics, $chemistry, $biology);

if ($stmt->execute()) {
    echo "Данные успешно сохранены!";
} else {
    echo "Ошибка: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>