<!DOCTYPE html>
<html lang="hu">

<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->include('components/head') ?>
</head>

<style>

footer{
  margin-top: 50px;
}

</style>

<body class="helping_quary">
  <?php $this->include('components/navbar') ?>
    <main class="container" style="margin-top: 100px;">  
    <?php $this->include('components/flashMessage') ?>
    <?php echo $content ?> 
  <?php $this->include('components/information') ?>
  </main>

  <div class="container-stb">
  <div class="svg-container">
  <img src="files/svg/Group.svg" alt="Person holding a dog" class="svg-right">
  <div class="overlay-text"><div class="sub-title">  <img src="/files/img/SPEEDY2-768x1253.jpg" alt="Person holding a dog" width="400px" height="600px">„Segítsd a menhely lakóit – adományozz egy boldogabb jövőért!</div>
  Egy kis támogatás is sokat jelent. Legyen szó ételről, gyógyszerről vagy játékokról, az adományod közvetlenül az állatok jólétét szolgálja.”</div>
  </div>
  <div class="extra-section">
  

<div class="cool-cards">
    <div class="card">
        <img src="/files/img/SPEEDY2-768x1253.jpg" alt="Cute Animal 1">
        <div class="card-content">
            <h3>Join Us</h3>
            <p>Help us bring a change by joining our community of animal lovers.</p>
        </div>
    </div>
    <div class="card">
        <img src="/files/img/SPEEDY2-768x1253.jpg" alt="Cute Animal 2">
        <div class="card-content">
            <h3>Donate Now</h3>
            <p>Your donations go directly to the care of our furry friends.</p>
        </div>
    </div>
    <div class="card">
        <img src="/files/img/SPEEDY2-768x1253.jpg" alt="Cute Animal 3">
        <div class="card-content">
            <h3>Adopt</h3>
            <p>Give a forever home to a pet in need of love and care.</p>
        </div>
    </div>
</div>

</div>

</div>

</div>

  <?php $this->include('components/footer') ?>

</body>

</html>
