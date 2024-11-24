<?php
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
        $this->sessionMock = $this->createMock(Session::class);

        // A Tools statikus metódusainak mockolása
        $this->toolsMock::staticExpects($this->any())
            ->method('FlashMessage');

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
$this->sessionMock->expects($this->once())
            ->method('create')
            ->with($concrateUser->id)
            ->willReturn(true);

        // Teszteljük a Get_user metódust
        $this->expectOutputRegex('/chooseOption/'); // Ellenőrizzük az átirányítást
        $this->loginController->Get_user($post);
    }

}
