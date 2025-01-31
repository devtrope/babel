<?php

include 'script.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $bookTitle; ?></title>
</head>
<body>
    <h1><?= $bookTitle; ?></h1>
    <select name="page" id="page">
        <?php for ($i = 1; $i <= 410; $i++): ?>
            <option value="<?= $i; ?>" <?= $i == $currentPage ? 'selected' : ''; ?>>Page <?= $i; ?></option>
        <?php endfor; ?>
    </select>
    <?php foreach ($page as $line): ?>
        <p><?= implode('', $line); ?></p>
    <?php endforeach; ?>

    <script defer>
        document.querySelector('select[name="page"]').addEventListener('change', () => {
            window.location.href = 'index.php?location=<?= $bookLocation; ?>&page=' + this.value
        })
    </script>
</body>
</html>