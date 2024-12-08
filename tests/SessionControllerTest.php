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

    public function testCreateSession(): void
    {
        $controller = new SessionController();

        $result = $controller->create(1);

        $this->assertTrue($result);
        $this->assertArrayHasKey('user', $_SESSION);
        $this->assertInstanceOf(Session::class, $_SESSION['user']);
        $this->assertEquals(1, $_SESSION['user']->user_id);
    }

    public function testDestroySession(): void
    {
        $_SESSION['user'] = new Session(1);

        $controller = new SessionController();
        $result = $controller->destroy();

        $this->assertTrue($result);
        $this->assertArrayNotHasKey('user', $_SESSION);
    }

    public function testIsAuthReturnsTrueIfSessionExists(): void
    {
        $_SESSION['user'] = new Session(1);

        $result = SessionController::isAuth();

        $this->assertTrue($result);
    }

    public function testIsAuthReturnsFalseIfNoSessionExists(): void
    {
        $result = SessionController::isAuth();

        $this->assertFalse($result);
    }
}
