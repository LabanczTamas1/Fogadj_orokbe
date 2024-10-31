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
    <!-- Üdvözlő üzenet -->
    <?php //if(!App\Helper::isAuth()) :?>
        <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Adj otthont egy szerető állatnak!</h1>
            <p>
                Találj rá a tökéletes társra és ments meg egy életet! Weboldalunkon várnak rád cicák, kutyák és más
                kisállatok, akik egy biztonságos, szerető otthont keresnek. Az örökbefogadás egyszerű, gyors és
                segítesz nekik egy boldogabb életet kezdeni. Nézz körül, válaszd ki új legjobb barátodat, és
                kezdjétek el együtt az új közös kalandot!
            </p>
            <a href="#" class="btn">Tudj meg többet!</a>
        </div>
    </section>
            <?php// else :
            ?>
            <?php //endif; ?>

    
            <section class="info-section">
        <div class="content">
            <img src="<?phpthis->asset('')?>" alt="Dog in arms">
            <p>
                Találj rá a tökéletes társra és ments meg egy életet! Weboldalunkon várnak rád cicák, kutyák és más
                kisállatok, akik egy biztonságos, szerető otthont keresnek.
            </p>
        </div>
    </section>
    
</body>

</html>