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
    <?php $this->include('components/navbar') ?>

    <main class="container" style="margin-top: 100px;">
      <?php echo $content; ?>
    </main>
   
  </div>
</body>

</html>
