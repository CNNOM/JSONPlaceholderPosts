<?php


$title = trim(filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS));
$content = trim(filter_var($_POST['content'], FILTER_SANITIZE_SPECIAL_CHARS));
$category = trim(filter_var($_POST['category'], FILTER_SANITIZE_SPECIAL_CHARS));

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');

$json = array();

try {
    $conn = new PDO('mysql:host=db;dbname=posts;port=3306', 'myuser', 'mypassword');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "INSERT INTO posts (title, content, category) VALUES (:title, :content, :category)";
    $Q = $conn->prepare($query);

    // Привязываем параметры
    $Q->bindParam(':title', $title);
    $Q->bindParam(':content', $content);
    $Q->bindParam(':category', $category);

    $Q->execute();

    // Получаем ID последней вставленной записи
    $lastInsertId = $conn->lastInsertId();

    $json['result'] = array(
        'status' => 'success',
        'message' => 'Post added successfully',
        'post_id' => $lastInsertId
    );

} catch (PDOException $e) {
    $json['result'] = array(
        'status' => 'error',
        'message' => 'Database error: ' . $e->getMessage()
    );
} finally {
    // Закрываем соединение
    $conn = null;
}

print(json_encode($json));