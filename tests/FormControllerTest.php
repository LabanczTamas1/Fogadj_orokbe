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

        // A Tools osztály statikus metódusainak mockolása
        $this->toolsMock::staticExpects($this->any())
            ->method('slugify')
            ->willReturn('mocked-slug');
        $this->toolsMock::staticExpects($this->any())
            ->method('FlashMessage');

        // Inicializáljuk a tesztelendő osztályt
        $this->formController = new FormController();
    }

}
