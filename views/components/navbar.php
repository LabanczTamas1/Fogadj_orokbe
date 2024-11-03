<nav class="navbar">
    <div class="logo" style=""><a href="/">Fogadj örökbe!</a></div>
    <div class="nav-links">
    <a href="/../pages/chooseOption">Ideiglenes link</a>
    <?php if(!App\Helper::isAuth()) :?>
        <a href="/../userhandle/register">Regisztráció</a>
        <a href="/../userhandle/login">Bejelentkezés</a>
        <?php else :?>
           <a href=""><?= App\Helper::user()->username ?></a> 
            <a href="/../userhandle/logout">Kijelentkezés</a>
        <?php endif; ?>
    </div>
</nav>
