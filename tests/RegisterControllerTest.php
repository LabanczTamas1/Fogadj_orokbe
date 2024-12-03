<?php

use App\Controllers\SessionController;
use PHPUnit\Framework\TestCase;
use App\Controllers\RegisterController;
use App\Models\User;

class RegisterControllerTest extends TestCase
{
    protected $registerController;
    protected $userMock;

    protected function setUp(): void
    {
        parent::setUp();

        // Reset the session
        $_SESSION = [];
    
        // Mock the `User` model
        $this->userMock = $this->createMock(User::class);
    
        // Replace the RegisterController and mock the `redirect` method
        $this->registerController = $this->getMockBuilder(RegisterController::class)
            ->setConstructorArgs([$this->userMock])
            ->onlyMethods(['redirect'])
            ->getMock();
    }
    

public function testInsertUserSuccess()
{
$postData = [
    'email' => 'test@example.com',
    'username' => 'testuser',
    'passwd1' => 'password123',
    'passwd2' => 'password123',
    'type' => 'User'
];

// Mock `getItemBy` to return false for both username and email
$this->userMock->expects($this->exactly(2))
    ->method('getItemBy')
    ->willReturn(false); // Simulate no existing user with the provided username or email



// Mock the redirect method to avoid actual header calls during tests
$this->registerController = $this->getMockBuilder(RegisterController::class)
    ->setConstructorArgs([$this->userMock])
    ->onlyMethods(['redirect'])  // Only mock the `redirect` method
    ->getMock();

// Expect redirect to be called with the home URL
$this->registerController->expects($this->once())
    ->method('redirect')
    ->with('/userhandle/login');

// Call `InsertUser` method and capture the result
$result = $this->registerController->InsertUser($postData);

// Assert that `InsertUser` returns true (indicating success)
$this->assertTrue($result);

}


    public function testInsertUserFailsWhenFieldsAreEmpty()
    {
        // Define post data with empty fields
        $postData = [
            'username' => '',
            'email' => '',
            'passwd1' => 'password123',
            'passwd2' => 'password123',
            'type' => 'User'
        ];

        // Call InsertUser method
        $result = $this->registerController->InsertUser($postData);

        // Assert that InsertUser returns false
        $this->assertFalse($result);

        // Assert that the flash message is correctly set
        $this->assertEquals(
            'Please provide valid username and email.',
            $_SESSION['flash_message']['message']
        );
    }

    public function testInsertUserFailsWhenPasswordsDoNotMatch()
    {
        // Define post data with mismatched passwords
        $postData = [
            'username' => 'testuser',
            'email' => 'test@example.com',
            'passwd1' => 'password123',
            'passwd2' => 'password124',
        ];

        // Call InsertUser method
        $result = $this->registerController->InsertUser($postData);

        // Assert that InsertUser returns false
        $this->assertFalse($result);

        // Assert that the flash message is correctly set
        $this->assertEquals(
            'Passwords do not match.',
            $_SESSION['flash_message']['message']
        );
    }

    public function testInsertUserFailsWhenUsernameAlreadyExists()
    {
        // Define post data where username already exists
        $postData = [
            'username' => 'existinguser',
            'email' => 'newemail@example.com',
            'passwd1' => 'password123',
            'passwd2' => 'password123',
        ];

        // Mock `getItemBy` to return true for existing username
        $this->userMock->expects($this->once())
            ->method('getItemBy')
            ->with('username', $postData['username'])
            ->willReturn(true);

        // Call InsertUser method
        $result = $this->registerController->InsertUser($postData);

        // Assert that InsertUser returns false
        $this->assertFalse($result);

        // Assert that the flash message is correctly set
        $this->assertEquals('Username already exists.', $_SESSION['flash_message']['message']);
    }

    public function testInsertUserFailsWhenEmailAlreadyExists()
    {
        $postData = [
            'username' => 'newuser',
            'email' => 'existing@example.com',
            'passwd1' => 'password123',
            'passwd2' => 'password123',
        ];
    
        // Mock `getItemBy` to check both username and email in sequence
        $this->userMock->expects($this->exactly(2))
            ->method('getItemBy')
            ->will($this->returnCallback(function ($field, $value) use ($postData) {
                if ($field === 'username' && $value === $postData['username']) {
                    return false; // Username does not exist
                }
                if ($field === 'email' && $value === $postData['email']) {
                    return true; // Email already exists
                }
                return null;
            }));
    
        // Call InsertUser method
        $result = $this->registerController->InsertUser($postData);
    
        // Assert that InsertUser returns false due to email conflict
        $this->assertFalse($result);
    
        // Check that the correct flash message was set
        $this->assertEquals('Email already exists.', $_SESSION['flash_message']['message']);
    }

}