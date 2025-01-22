<?php

require '../vendor/autoload.php';
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

    // Выводим результат
    echo "Status Code: $statusCode\n";

    // Декодируем JSON (если ответ в формате JSON)
    $data = json_decode($body, true);
    echo '<pre>';
    if ($data) {
        // Если данные успешно декодированы, выводим их в удобном формате
        echo "Body:\n";
        print_r($data); // Используем print_r для удобного вывода массива
    } else {
        // Если JSON не удалось декодировать, выводим сырой ответ
        echo "Body (raw):\n";
        echo $body;
    }
    echo '</pre>';

} catch (RequestException $e) {
    // Обработка ошибок
    echo "Error: " . $e->getMessage() . "\n";
    if ($e->hasResponse()) {
        echo "Response: " . $e->getResponse()->getBody()->getContents() . "\n";
    }
}