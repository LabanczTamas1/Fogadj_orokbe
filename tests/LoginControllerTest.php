<?php
use PHPUnit\Framework\TestCase;
use App\Controllers\LoginController;
use App\Models\User;

class LoginControllerTest extends TestCase
{
    protected $loginController;
    protected $userMock;
    protected $sessionMock;

    protected function setUp(): void
    {
        parent::setUp();

        // Reseteljük a $_SESSION változót minden teszt előtt
        $_SESSION = [];

        // Mockoljuk a felhasználói modellt
        $this->userMock = $this->createMock(User::class);

        // Új példányosítjuk a LoginController-t
        $this->loginController = new LoginController();
    }

    public function testSuccessfulLogin()
    {
        // Sikeres bejelentkezés tesztelése
        $postData = [
            'email' => 'test@example.com',
            'passwd' => 'correctpassword'
        ];

        // Mockoljuk a User::getItemBy metódust, hogy visszaadjon egy meglévő felhasználót
        $user = $this->createMock(User::class);
        $user->method('getItemBy')->willReturn($user);
        $user->password = password_hash('correctpassword', PASSWORD_BCRYPT);
        $user->fullname = 'Test User';
        $user->type = 'User';
        $this->userMock->method('getItemBy')->willReturn($user);


        // Simuláljuk a header hívást a helyes URL irányításhoz
        ob_start(); // Elkezdem a kimenet pufferelését
        $this->loginController->Get_user($postData);
        $output = ob_get_clean(); // Kiolvassuk a pufferelt kimenetet

 
    }

    public function testFailedLoginWrongPassword()
    {
        // Hibás jelszó tesztelése
        $postData = [
            'email' => 'test@example.com',
            'passwd' => 'wrongpassword'
        ];

        // Mockoljuk, hogy a felhasználó létezik, de a jelszó nem megfelelő
        $user = $this->createMock(User::class);
        $user->method('getItemBy')->willReturn($user);
        $user->password = password_hash('correctpassword', PASSWORD_BCRYPT);
        $this->userMock->method('getItemBy')->willReturn($user);

        // Teszteljük a bejelentkezési funkciót
        $this->loginController->Get_user($postData);

        // Ellenőrizzük, hogy a helyes hibaüzenet megjelenik az $_SESSION-ben
        $this->assertEquals('Nem megfelelő a jelszó!', $_SESSION['flash_message']['message']);
    }

    public function testFailedLoginUserNotFound()
    {
        // Nem létező felhasználó tesztelése
        $postData = [
            'email' => 'nonexistent@example.com',
            'passwd' => 'password123'
        ];

        // Mockoljuk, hogy a felhasználó nem található
        $this->userMock->method('getItemBy')->willReturn(null);

        // Teszteljük a bejelentkezési funkciót
        $this->loginController->Get_user($postData);

        // Ellenőrizzük, hogy a helyes hibaüzenet megjelenik az $_SESSION-ben
        $this->assertEquals('Nincsen ilyen felhasználó!', $_SESSION['flash_message']['message']);
    }
}
