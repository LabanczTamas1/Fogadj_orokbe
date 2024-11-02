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
  <div class="overlay-text"><div class="sub-title">  <img src="files/img/SPEEDY2-768x1253.jpg" alt="Person holding a dog" width="0px" height="600px">„Segítsd a menhely lakóit – adományozz egy boldogabb jövőért!</div>
  Egy kis támogatás is sokat jelent. Legyen szó ételről, gyógyszerről vagy játékokról, az adományod közvetlenül az állatok jólétét szolgálja.”</div>

</div>

    <?php $this->include('components/footer') ?>
  </div>
</body>

</html>
