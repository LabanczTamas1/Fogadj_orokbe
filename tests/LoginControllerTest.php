<?php
namespace Tests;

use App\Controllers\SessionController;
use PHPUnit\Framework\TestCase;
use App\Controllers\LoginController;
use App\Models\User;
use App\Tools;

class LoginControllerTest extends TestCase
{
    private $loginController;
    private $userMock;
    private $toolsMock;
    private $sessionMock;

    protected function setUp(): void
    {
        // Mockoljuk a User és Tools osztályokat, valamint a session objektumot
        $this->userMock = $this->createMock(User::class);
        $this->toolsMock = $this->getMockBuilder(Tools::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->sessionMock = $this->createMock(SessionController::class);
        // A tesztelendő osztály inicializálása
        $this->loginController = new LoginController();
    }

    public function testSuccessfulLogin()
    {
        $post = [
            'email' => 'john@example.com',
            'passwd' => 'correctpassword'
        ];

        $concrateUser = (object)[
            'id' => 1,
            'fullname' => 'John Doe',
            'password' => password_hash('correctpassword', PASSWORD_DEFAULT),
            'type' => 'User'
        ];


        // Teszteljük a Get_user metódust
        $this->expectOutputRegex("/chooseOption"); // Ellenőrizzük az átirányítást
        $this->loginController->Get_user($post);
        return true;
    }

    public function testIncorrectPassword()
    {
        $post = [
            'email' => 'john@example.com',
            'passwd' => 'wrongpassword'
        ];

        $concrateUser = (object)[
            'id' => 1,
            'fullname' => 'John Doe',
            'password' => password_hash('correctpassword', PASSWORD_DEFAULT),
            'type' => 'User'
        ];

        // Mockoljuk a User osztály metódusát
        $this->userMock->expects($this->once())
            ->method('getItemBy')
            ->with('email', $post['email'])
            ->willReturn($concrateUser);

        // Teszteljük a Get_user metódust
        $this->expectOutputRegex('/Nem megfelelő a jelszó!/');
        $this->loginController->Get_user($post);
    }
    
    public function testNonExistentUser()
    {
        $post = [
            'email' => 'nonexistent@example.com',
            'passwd' => 'password'
        ];

        // Mockoljuk a User osztály metódusát
        $this->userMock->expects($this->once())
            ->method('getItemBy')
            ->with('email', $post['email'])
            ->willReturn(null);

        // Teszteljük a Get_user metódust
        $this->expectOutputRegex('/Nincsen ilyen felhasználó!/');
        $this->loginController->Get_user($post);
    }      
}
