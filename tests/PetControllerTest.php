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
    
    public function testUpdatePetSuccess()
    {
        $pet = new Pet(); // Hozzon létre egy tesztpetet az adatbázisban
        $arr = [
            'id' => $pet->id,
            'postname' => 'Macska',
            'pet_name' => 'Mici',
            'pet_gender' => 'N',
            'pet_breed' => 'Bengál',
            'pet_status' => 'Y4:0',
            'pet_age' => '2',
            'description' => 'Szőrös macska',
            'shelter_id' => 1,
        ];

        $controller = new PetController();
        $result = $controller->updatePet($arr);

        $this->assertTrue($result);
    }

}
