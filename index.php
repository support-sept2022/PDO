<?php
require_once '_connect.php';

$pdo = new \PDO(DSN, USER, PASS);

define('ERROR_REQUIRED', 'Le champ ne peut être vide');

$errors = [
    'name' => '',
    'platform' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = array_map("trim", $_POST);

    $name = $data['name'] ?? '';
    $platform = $data['platform'] ?? '';

    if (empty($name)) {
        $errors['name'] = ERROR_REQUIRED;
    }
    if (empty($plateforme)) {
        $errors['platform'] = ERROR_REQUIRED;
    }

    if (!empty($name) && !empty($data)) {
    $query = 'INSERT INTO games (name, platform) VALUES (:name, :platform)';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':name', $name, \PDO::PARAM_STR);
    $statement->bindValue(':platform', $platform, \PDO::PARAM_STR);
    $statement->execute();
    header('location:index.php');
    }
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Video Games Collector</title>
</head>
<body>
<div id="game">
    <div id="qbert"></div>
    <div id="pyramid"></div>
</div>
<div class="container">
    <h1 class="neonText">Add Your video game</h1>
</div>
<form method="POST" action="">
    <div class="formDiv">
        <label for="name">Name</label>
        <input id="name" name="name" type="text">
        <?php echo '<p>' . $errors['name'] . '</p> ' ?>
    </div>
    <div class="formDiv">
        <label for="platform">platform</label>
        <input id="platform" name="platform" type='text'>
        <?php echo '<p>' . $errors['platform'] . '</p> ' ?>
    </div>
    <button type="submit">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Add Game
    </button>
</form>
</body>
</html>