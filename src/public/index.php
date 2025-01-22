
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated HTML</title>
    <style>
        .news-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .news-card {
            width: calc(33.33% - 20px);
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .news-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .news-card-content {
            padding: 16px;
        }

        .news-card h2 {
            font-size: 1.5em;
            margin: 0 0 10px;
        }

        .news-card p {
            font-size: 1em;
            color: #555;
            margin: 0 0 10px;
        }

        .news-card .published-at {
            font-size: 0.9em;
            color: #888;
        }

        .news-card .category {
            font-size: 0.9em;
            color: #007BFF;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php
$posts = require './scripts/getPosts.php';
$count = 0;
?>
<a href="api/getApi.php">api</a>
<div class="news-container">
    <?php foreach ($posts as $post): ?>
        <?php if ($count == 10) break; ?>

        <div class="news-card">
            <img src="<?= htmlspecialchars($post['image']) ?>" alt="News Image">
            <div class="news-card-content">
                <h2><?= htmlspecialchars($post['title']) ?></h2>
                <p><?= htmlspecialchars($post['content']) ?></p>
                <div class="published-at">Опубликовано: <?= htmlspecialchars($post['publishedAt']) ?></div>
                <div class="category">Категория: <?= htmlspecialchars($post['category']) ?></div>
            </div>
        </div>
        <?php $count++; ?>
    <?php endforeach; ?>
</div>
<form method="post"  action="./api/postApi.php">
    <label for="title">Заголовок:</label>
    <input type="text" id="title" name="title" required>

    <label for="content">Содержание:</label>
    <textarea id="content" name="content" rows="5" required></textarea>

<!--    <label for="image">URL изображения:</label>-->
<!--    <input type="text" id="image" name="image" required>-->

<!--    <label for="publishedAt">Дата публикации:</label>-->
<!--    <input type="date" id="publishedAt" name="publishedAt" required>-->

    <label for="category">Категория:</label>
    <input type="text" id="category" name="category" required>

    <button type="submit">Создать новость</button>
</form>

<form  method="post"  action="./scripts/getPostsId.php">
    <input type="text" name="postId" >
    <button type="submit">найти</button>
</form>

</body>
</html>