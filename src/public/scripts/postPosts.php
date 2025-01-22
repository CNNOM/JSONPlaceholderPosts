<?php

require __DIR__ . '/../../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

$client = new Client();
$title = trim(filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS));
$content = trim(filter_var($_POST['content'], FILTER_SANITIZE_SPECIAL_CHARS));
$image = trim(filter_var($_POST['image'], FILTER_SANITIZE_SPECIAL_CHARS));
$publishedAt = trim(filter_var($_POST['publishedAt'], FILTER_SANITIZE_SPECIAL_CHARS));
$category = trim(filter_var($_POST['category'], FILTER_SANITIZE_SPECIAL_CHARS));

$newPost = [
    'title' => $title,
    'content' => $content,
    'image' => $image,
    'publishedAt' => $publishedAt,
    'category' => $category
];


//$data =  json_encode($newPost);
//
//echo '<pre>';
//
//print_r($data);
//echo '</pre>';

$response = $client->request('POST', 'https://jsonplaceholder.typicode.com/posts', [
    'json' => $newPost, // Автоматически кодирует данные в JSON
]);

// Получаем тело ответа
$body = $response->getBody()->getContents();

// Выводим ответ
print_r(json_decode($body, true));