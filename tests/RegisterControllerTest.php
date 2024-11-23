<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Controllers\RegisterController;
use App\Models\User;
use App\Tools;
use App\Controllers\SessionController;
class RegisterControllerTest extends TestCase
{
    private $userMock;
    private $controller;

    protected function setUp(): void
    {
        $this->userMock = $this->createMock(User::class);
        $this->controller = new RegisterController($this->userMock);
    }

    public function testInsertUserFailsWhenUsernameOrEmailIsEmpty()
    {
        Tools::FlashMessage('FlashMessage')->willReturn(null); // Mock Tools::FlashMessage

        $postData = [
            'username' => '',
            'email' => '',
            'passwd1' => 'password123',
            'passwd2' => 'password123',
            'type' => 'User',
        ];

        $result = $this->controller->InsertUser($postData);

        $this->assertFalse($result);
    }

    public function testInsertUserFailsWhenPasswordsDoNotMatch()
    {
        Tools::FlashMessage('FlashMessage')->willReturn(null); // Mock Tools::FlashMessage

        $postData = [
            'username' => 'testuser',
            'email' => 'test@example.com',
            'passwd1' => 'password123',
            'passwd2' => 'password456',
            'type' => 'User',
        ];

        $result = $this->controller->InsertUser($postData);

        $this->assertFalse($result);
    }

    public function testInsertUserFailsWhenUsernameAlreadyExists()
    {
        Tools::FlashMessage('FlashMessage')->willReturn(null); // Mock Tools::FlashMessage

        $this->userMock->getItemBy('getItemBy')->with('username', 'testuser')->willReturn(true);

        $postData = [
            'username' => 'testuser',
            'email' => 'test@example.com',
            'passwd1' => 'password123',
            'passwd2' => 'password123',
            'type' => 'User',
        ];

        $result = $this->controller->InsertUser($postData);

        $this->assertFalse($result);
    }

    public function testInsertUserFailsWhenEmailAlreadyExists()
    {
        Tools::FlashMessage('FlashMessage')->willReturn(null); // Mock Tools::FlashMessage

        $this->userMock->getItemBy('getItemBy')->willReturnCallback(function($field, $value) {
            return $field === 'email' ? true : false;
        });

        $postData = [
            'username' => 'testuser',
            'email' => 'test@example.com',
            'passwd1' => 'password123',
            'passwd2' => 'password123',
            'type' => 'User',
        ];

        $result = $this->controller->InsertUser($postData);

        $this->assertFalse($result);
    }

    public function testInsertUserSucceeds()
    {
        Tools::FlashMessage('FlashMessage')->willReturn(null); // Mock Tools::FlashMessage
        Tools::Crypt('Crypt')->willReturn('encrypted_password'); // Mock Tools::Crypt

        $this->userMock->method('getItemBy')->willReturn(false); // No duplicates
        $this->userMock->method('save')->willReturn(true);

        global $session;
        $session = $this->createMock(SessionController::class);
        $session->create('create')->willReturn(true);

        $postData = [
            'username' => 'testuser',
            'email' => 'test@example.com',
            'passwd1' => 'password123',
            'passwd2' => 'password123',
            'type' => 'User',
        ];

        $result = $this->controller->InsertUser($postData);

        $this->assertTrue($result);
    }
}
