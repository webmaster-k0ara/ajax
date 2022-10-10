<?php

require_once(__DIR__ . '/../app/config.php');

use MyApp\Database;
use MyApp\Todo;
use MyApp\Utils;


$pdo = Database::getInstance();
$todo = new Todo($pdo);
$todo->processPost();
$todos = $todo->getAll();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>My Todos</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <main data-token="<?= Utils::h($_SESSION['token']) ?>">
    <header>
      <h1>Todos</h1>
    </header>

    <form>
      <input type="text" name="title" placeholder="Type new todo.">
    </form>

    <ul>
      <?php foreach ($todos as $todo) : ?>
        <li data-id="<?= Utils::h($todo->id); ?>">
          <span><?= Utils::h($todo->title); ?></span>
        </li>
      <?php endforeach; ?>
    </ul>
  </main>
  <script src="js/main.js"></script>
</body>

</html>
