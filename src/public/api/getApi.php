<?php

// Устанавливаем заголовок для возврата JSON

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');

$json  = array();

$conn = new PDO('mysql:host=db;dbname=posts;port=3306', 'myuser', 'mypassword');

$query = "SELECT * FROM posts";


$json['query'] = $query;

$Q = $conn->prepare($query);
$Q->execute();

$json['result'] = array();
$result = $Q->fetchAll();
foreach ($result as $row) {
    $json['result'][] = array(
        'id' => $row['id'],
        'title' => $row['title'],
        'content' => $row['content'],
        'category' => $row['category']
    );
}

print(json_encode($json));
