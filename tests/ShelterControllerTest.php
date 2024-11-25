<?php
namespace Tests;

use App\Controllers\ShelterController;
use PHPUnit\Framework\TestCase;
use App\Controllers\RegisterController;
use App\Models\User;
use App\Tools;

class ControllerShelterTest extends TestCase {

    private $controller;
    private $shelterModel;
    private $helperMock;
    private $toolsMock;
    private $imageMock;

    protected function setUp(): void {
        parent::setUp();
        
        $this->controller = new ShelterController();
        $this->shelterModel = Mockery::mock(SHELTER_MODEL);
        $this->helperMock = Mockery::mock(Helper::class);
        $this->toolsMock = Mockery::mock(Tools::class);
        $this->imageMock = Mockery::mock(Image::class);
        
        $this->controller->shelterModel = $this->shelterModel;
        $this->controller->helper = $this->helperMock;
        $this->controller->tools = $this->toolsMock;
        $this->controller->image = $this->imageMock;
    }

    public function testShelterUpload() {
        $post = [
            'shelter_name' => 'Test Shelter',
            'city' => 'Test City',
            'description' => 'Test Description'
        ];

        $this->helperMock->shouldReceive('user')->once()->andReturn(Mockery::mock(['id' => 1]));
        $this->toolsMock->shouldReceive('slugify')->once()->with('Test Shelter')->andReturn('test-shelter-slug');
        
        $result = $this->controller->shelterUpload($post);

        $this->assertTrue($result);
        $this->assertEquals(1, $this->helperMock->user()->id);
        $this->assertEquals('test-shelter-slug', $this->shelterModel->getShelterSlug());
    }
}