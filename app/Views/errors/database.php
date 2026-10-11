
<?php
$language = Language::get();
$direction = Language::direction();
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($language, ENT_QUOTES, 'UTF-8') ?>"
      dir="<?= htmlspecialchars($direction, ENT_QUOTES, 'UTF-8') ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(__('constructpro_system'), ENT_QUOTES, 'UTF-8') ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            background: #f4f6f9;
            color: #333;
        }
        .error-box {
            max-width: 520px;
            margin: 24px;
            padding: 32px;
            background: #fff;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        h1 { font-size: 22px; }
        p { line-height: 1.7; }
    </style>
</head>
<body>
    <main class="error-box">
        <h1><?= htmlspecialchars(__('constructpro_system'), ENT_QUOTES, 'UTF-8') ?></h1>
        <p>
            <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
        </p>
    </main>
</body>
</html>
