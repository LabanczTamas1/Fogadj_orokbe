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

}
