<?php
require __DIR__ . '/../../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

// Создаем клиент Guzzle
$client = new Client();

$postId = trim(filter_var($_POST['postId'], FILTER_SANITIZE_SPECIAL_CHARS));



$response = $client->request('GET', 'https://jsonplaceholder.org/posts/' . $postId);

$body = $response->getBody()->getContents();

$data = json_decode($body, true);

echo '<div class="news-container">
                <div class="news-card">
                    <img src="' . htmlspecialchars($data['image']) . '" alt="News Image">
                    <div class="news-card-content">
                        <h2>' . htmlspecialchars($data['title'] ?? 'Нет заголовка') . '</h2>
                        <p>' . htmlspecialchars($data['content'] ?? 'Нет содержимого') . '</p>
                        <div class="published-at">Опубликовано: ' . htmlspecialchars($data['publishedAt'] ?? 'Нет даты') . '</div>
                        <div class="category">Категория: ' . htmlspecialchars($data['category'] ?? 'Нет категории') . '</div>
                    </div>
                </div>
              </div>';