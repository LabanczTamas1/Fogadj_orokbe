<?php
use PHPUnit\Framework\TestCase;
use App\Controllers\FormController;
use App\Models\Form;
use App\Tools;

class FormControllerTest extends TestCase
{
    private $formController;
    private $formMock;
    private $toolsMock;

    protected function setUp(): void
    {
        // Mockoljuk a Form és Tools osztályokat
        $this->formMock = $this->createMock(Form::class);
        $this->toolsMock = $this->getMockBuilder(Tools::class)
            ->disableOriginalConstructor()
            ->getMock();

     

        // Inicializáljuk a tesztelendő osztályt
        $this->formController = new FormController();
    }

    public function testFormSendSuccess()
    {
        // Adatok előkészítése
        $data = [
            'fullname' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Hello World!',
            'pet_id' => '1',
            'shelter_id' => '2',
            'user_id' => '3',
            'postname' => 'Form submission'
        ];

        // Mockoljuk a Form mentésének sikerességét
        $this->formMock->expects($this->once())
            ->method('save')
            ->willReturn(true);

        // Teszteljük a formSend metódust
        $result = $this->formController->formSend($data);

        // Ellenőrizzük a várható viselkedést
        $this->assertNull($result); // A metódus nem ad vissza semmit, ha sikeres
    }

    public function testFormSendFailure()
    {
        // Adatok előkészítése
        $data = [
            'fullname' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Hello World!',
            'pet_id' => '1',
            'shelter_id' => '2',
            'user_id' => '3',
            'postname' => 'Form submission'
        ];

        // Mockoljuk a Form mentésének sikertelenségét
        $this->formMock->expects($this->once())
            ->method('save')
            ->willThrowException(new \Exception('Database error'));

        // Teszteljük a formSend metódust
        $result = $this->formController->formSend($data);

        // Ellenőrizzük a várható viselkedést
        $this->assertFalse($result); // Sikertelenség esetén a metódus false-t ad vissza
    }
}
