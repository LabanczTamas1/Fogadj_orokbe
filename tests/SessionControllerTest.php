<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Controllers\SessionController;
use App\Session;

class SessionControllerTest extends TestCase
{
    protected function setUp(): void
    {
        $_SESSION = []; // Szimulálja az $_SESSION tömböt
    }

    public function testAuthAssignsSessionIfExists()
    {
        $_SESSION['user'] = new Session(1);

        $controller = new SessionController();
        $result = $controller->getSession();

        $this->assertInstanceOf(Session::class, $result);
        $this->assertEquals(1, $result->getUserId());
    }

    public function testCreateSession()
    {
        $controller = new SessionController();

        $result = $controller->create(1);

        $this->assertTrue($result);
        $this->assertArrayHasKey('user', $_SESSION);
        $this->assertInstanceOf(Session::class, $_SESSION['user']);
        $this->assertEquals(1, $_SESSION['user']->getUserId());
    }

    public function testDestroySession()
    {
        $_SESSION['user'] = new Session(1);

        $controller = new SessionController();
        $result = $controller->destroy();

        $this->assertTrue($result);
        $this->assertArrayNotHasKey('user', $_SESSION);
    }

    public function testIsAuthReturnsTrueIfSessionExists()
    {
        $_SESSION['user'] = new Session(1);

        $result = SessionController::isAuth();

        $this->assertTrue($result);
    }

    public function testIsAuthReturnsFalseIfNoSessionExists()
    {
        $result = SessionController::isAuth();

        $this->assertFalse($result);
    }

    public function testGetSessionReturnsNullIfNoSessionExists()
    {
        $controller = new SessionController();
        $result = $controller->getSession();

        $this->assertNull($result);
    }
}
