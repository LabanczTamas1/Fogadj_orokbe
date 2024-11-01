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
        
    <?php $this->include('components/information') ?>
    
    </main>
    <div class="container-stb">

    
    <div class="svg-container">
    <img src="files/svg/Group.svg" alt="Person holding a dog" class="svg-right">
    </div>
    <!-- Footer -->
    <footer>
      <p>© Mr. Weboldal Inc. 2024</p>
      <div>
        <a href="#">About</a> | <a href="#">Terms and Policy</a>
      </div>
    </footer>
  </div>
</body>

</html>
