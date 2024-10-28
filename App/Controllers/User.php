<?php
namespace App\Models;

use App\Model;

class Pet extends Model
{
    public string $table = "pet_posts";

    public array $attributes = [
        'id' => 'int',
        'postname' => 'string',
        'slug' => 'string',
        'shelter_id' => 'int',
        'user_id' => 'int',
        'pet_name'=> 'string',
        'pet_gender'=> 'string',
        'pet_breed'=> 'string',
        'pet_status'=> 'boolean',
        'pet_age' => 'int',
        'description'=> 'string'
    ];
}