<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\FormController;
use App\Models\Form;

class FormControllerTest extends TestCase
{
    protected $formControllerMock;
    protected $formMock;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create a mock for the Form model
        $this->formMock = $this->createMock(Form::class);

        // Mock FormController with a mocked Form instance
        $this->formControllerMock = new FormController($this->formMock);
    }

    public function testFormSendSuccess()
    {
        var_dump("Starting testFormSendSuccess");
    
        $data = [
            'fullname' => 'Test Name',
            'email' => 'test@example.com',
            'message' => 'Test Message',
            'pet_id' => 1,
            'shelter_id' => 2,
            'user_id' => 3,
            'postname' => 'Test',
        ];
    
        $this->formMock->expects($this->once())
            ->method('save')
            ->willReturn(true);
    
        $result = $this->formControllerMock->formSend($data);
    
        var_dump("Result: ", $result);
        $this->assertTrue($result);
        
    }
    

    public function testFormSendFails()
    {
        // Szimuláljuk, hogy a save() metódus sikertelen
        $this->formMock->expects($this->once())
            ->method('save')
            ->willReturn(false);

        $data = [
            'fullname' => 'John Doe',
            'email' => 'johndoe@example.com',
            'message' => 'Test Message',
            'pet_id' => 1,
            'shelter_id' => 1,
            'user_id' => 1,
            'postname' => 'Failure Test'
        ];

        $result = $this->formControllerMock->formSend($data);

        $this->assertFalse($result, "The save should return false on failed save.");
    }

    public function testFormSendThrowsException()
    {
        // Szimuláljuk az exception-t a save metódus során
        $this->formMock->expects($this->once())
            ->method('save')
            ->willThrowException(new \Exception('Simulated failure'));

        $data = [
            'fullname' => 'John Doe',
            'email' => 'johndoe@example.com',
            'message' => 'Test Message',
            'pet_id' => 1,
            'shelter_id' => 1,
            'user_id' => 1,
            'postname' => 'Exception Test'
        ];

        $result = $this->formControllerMock->formSend($data);

        $this->assertFalse($result, "The save should handle exception and return false.");
    }
    public function testUpdateMessageSuccess()
{
    // Mock a Form objektumra, hogy szimulálni tudjuk a sikeres frissítést
    $this->formMock->expects($this->once())
        ->method('getItemById')
        ->willReturnSelf();
    $this->formMock->expects($this->once())
        ->method('update')
        ->willReturn(true);

    $post = [
        "id" => 1,
        "message" => "Updated Message"
    ];

    $result = $this->formControllerMock->updateMessage($post);

    $this->assertTrue($result, "The message update should return true on success.");
}

public function testUpdateMessageFails()
{
    // Mock a sikertelen frissítést
    $this->formMock->expects($this->once())
        ->method('getItemById')
        ->willReturnSelf();
    $this->formMock->expects($this->once())
        ->method('update')
        ->willReturn(false);

    $post = [
        "id" => 1,
        "message" => "Failed Update"
    ];

    $result = $this->formControllerMock->updateMessage($post);

    $this->assertFalse($result, "The message update should return false when update fails.");
}

public function testUpdateMessageThrowsException()
{
    $this->formMock->expects($this->once())
        ->method('getItemById')
        ->willReturnSelf();
    $this->formMock->expects($this->once())
        ->method('update')
        ->willThrowException(new \Exception('Simulated failure'));

    $post = [
        "id" => 1,
        "message" => "Exception Test"
    ];

    $result = $this->formControllerMock->updateMessage($post);

    $this->assertFalse($result, "The method should handle exceptions and return false.");
}
}
