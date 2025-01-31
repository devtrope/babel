<?php

include 'script.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $bookTitle; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="page-container">
        <?php if ($currentPage == 1) : ?>
            <h1><?= $bookTitle; ?></h1>
        <?php endif; ?>

        <pre>
            <?php foreach ($page as $line): ?>
                <?= implode('', $line); ?>
            <?php endforeach; ?>
        </pre>

        <p><?= $currentPage; ?></p>
    </div>
    
    <select name="page" id="page" class="form-select">
        <?php for ($i = 1; $i <= 410; $i++): ?>
            <option value="<?= $i; ?>" <?= $i == $currentPage ? 'selected' : ''; ?>>Page <?= $i; ?></option>
        <?php endfor; ?>
    </select>

    <script defer>
        document.querySelector('select[name="page"]').addEventListener('change', e => {
            window.location.href = 'index.php?location=<?= $bookLocation; ?>&page=' + e.target.value
        })
    </script>
</body>
</html>