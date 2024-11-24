<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Controllers\RegisterController;
use App\Models\User;
use App\Tools;
use App\Controllers\SessionController;

class PetControllerTest extends TestCase
{
    private $userMock;
    private $controller;

    protected function setUp(): void
    {
        $this->userMock = $this->createMock(User::class);
        $this->controller = new Petontroller($this->userMock);
    }

    public function testInsertPetSuccess()
    {
        $arr = [
            'postname' => 'Kutya',
            'pet_name' => 'Buci',
            'pet_gender' => 'M',
            'pet_breed' => 'Pumi',
            'pet_age' => '3',
            'description' => 'Jó kutya',
            'shelter_id' => 1,
        ];

        $controller = new PetController();
        $result = $controller->insertPet($arr);

        $this->assertTrue($result);
    }
    
}
