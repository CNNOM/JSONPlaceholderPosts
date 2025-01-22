<?php

require __DIR__ . '/../../vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

// Создаем клиент Guzzle
$client = new Client();

try {
    // Выполняем GET-запрос
    $response = $client->request('GET', 'https://jsonplaceholder.org/posts');

    // Получаем статус ответа
    $statusCode = $response->getStatusCode();

    // Получаем тело ответа
    $body = $response->getBody()->getContents();

    // Декодируем JSON (если ответ в формате JSON)
    $data = json_decode($body, true);
    echo '<pre>';

    if ($data) {

        return $data;

    } else {
        echo "Body (raw):\n";
        echo $body;
    }
    echo '</pre>';

} catch (RequestException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    if ($e->hasResponse()) {
        echo "Response: " . $e->getResponse()->getBody()->getContents() . "\n";
    }
}