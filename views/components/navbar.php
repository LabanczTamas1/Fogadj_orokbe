<nav class="navbar">
    <div class="logo">
        <a href="/">Fogadj örökbe!</a>
    </div>
    <div class="nav-links">
        <a href="/../pages/chooseOption">Keresés</a>
        
        <?php if (!App\Helper::isAuth()) : ?>
            <a href="/../userhandle/register">Regisztráció</a>
            <a href="/../userhandle/login">Bejelentkezés</a>
        <?php else : ?>
            <?php if (App\Helper::user()->type === 'Shelter') : ?>
                <a href="/../pets/create.php">+ Kisállat hozzáadása</a>
                <a href="/../shelters/create.php">+ Menhely hozzáadása</a>
                <a href="/../pages/profile"><?= htmlspecialchars(App\Helper::user()->username) ?> <i class="fa-solid fa-user"></i></a>
                <a href="/../userhandle/logout">Kijelentkezés</a>
            <?php endif; ?>
            <a href="/../userhandle/logout">Kijelentkezés</a>

        <?php endif; ?> 
    </div>
</nav>
