//require './scripts/getPosts.php';
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated HTML</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Posts Table</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
        </tr>

        <?php
        $data = require './scripts/getPosts.php';
        foreach ($data as $row):
            ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['slug']) ?></td>
                <td><?= htmlspecialchars($row['url']) ?></td>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars($row['content']) ?></td>
                <td><?= htmlspecialchars($row['image']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>