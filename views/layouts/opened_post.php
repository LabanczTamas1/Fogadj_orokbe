<!DOCTYPE html>
<html lang="hu">

<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->include('components/head') ?>
</head>

<body class="helping_quary">
    <header>
    <?php $this->include('components/navbar') ?>
    </header>

    <main>
    <?php $this->include('components/flashMessage') ?>

    <img src="https://via.placeholder.com/1296x734" class="card-img-top" alt="Patagonia Map">
    <?php include __DIR__ . '/../components/comment.php'; ?>
    <?php include __DIR__ . '/../components/comment.php'; ?>
    <?php include __DIR__ . '/../components/comment.php'; ?>
    </main>

</body>

</html>
