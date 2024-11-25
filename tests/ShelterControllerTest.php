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

    public function testShelterUploadWithImage() {
        $post = [
            'shelter_name' => 'Test Shelter',
            'city' => 'Test City',
            'description' => 'Test Description'
        ];

        $this->helperMock->shouldReceive('user')->once()->andReturn(Mockery::mock(['id' => 1]));
        $this->toolsMock->shouldReceive('slugify')->once()->with('Test Shelter')->andReturn('test-shelter-slug');
        $this->imageMock->shouldReceive('ImageUpload')->once()->with($_FILES, '/files/shelter_image/')->andReturn('new-image.jpg');
        
        $result = $this->controller->shelterUpload($post);

        $this->assertTrue($result);
        $this->assertEquals('new-image.jpg', $this->shelterModel->getImg());
    }

    public function testShelterUpdate() {
        $arr = [
            'id' => 1,
            'shelter_name' => 'Updated Shelter',
            'city' => 'Updated City',
            'description' => 'Updated Description'
        ];

        $this->helperMock->shouldReceive('user')->once()->andReturn(Mockery::mock(['id' => 1]));
        $this->toolsMock->shouldReceive('slugify')->once()->with('Updated Shelter')->andReturn('updated-shelter-slug');
        
        $result = $this->controller->shelterUpdate($arr);

        $this->assertTrue($result);
        $this->assertEquals('updated-shelter-slug', $this->shelterModel->getShelterSlug());
    }

    public function testShelterUpdateWithImage() {
        $arr = [
            'id' => 1,
            'shelter_name' => 'Updated Shelter',
            'city' => 'Updated City',
            'description' => 'Updated Description'
        ];

        $this->helperMock->shouldReceive('user')->once()->andReturn(Mockery::mock(['id' => 1]));
        $this->toolsMock->shouldReceive('slugify')->once()->with('Updated Shelter')->andReturn('updated-shelter-slug');
        $this->imageMock->shouldReceive('UpdateImage')->once()->with($this->shelterModel->getImg(), $_FILES, '/files/shelter_image/')->andReturn('new-image.jpg');
        
        $result = $this->controller->shelterUpdate($arr);

        $this->assertTrue($result);
        $this->assertEquals('new-image.jpg', $this->shelterModel->getImg());
    }

    public function testShelterUploadEmptyFields() {
        $post = [];
        
        $result = $this->controller->shelterUpload($post);

        $this->assertFalse($result);
        $this->assertArrayHasKey('errors', $this->controller->errors);
        $this->assertEquals('Adjon meg egy menháznevet!', $this->controller->errors['shelter_name'][0]);
        $this->assertEquals('Adjon meg egy várost!', $this->controller->errors['city'][0]);
        $this->assertEquals('Írja le a menház leírását!', $this->controller->errors['description'][0]);
    }
}