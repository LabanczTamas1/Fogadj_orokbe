<!DOCTYPE html>
<html lang="hu">

<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->include('components/head') ?>
    
    <!-- Inline style to set background color and remove any image -->
    <style>
        body {
            background-color: #083633;
            background-image: none; /* Disable any background image */
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
        }
    </style>
</head>

<body class="helping_quary">
    <?php $this->include('components/navbar') ?>
    <main class="container" style="margin-top: 100px;">
        <?php $this->include('components/flashMessage') ?>
      <?php echo $content; ?>

    </main>
    
</body>

</html>  
