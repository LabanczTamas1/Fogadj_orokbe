<?php
namespace App\Models;

use App\Model;

class Shelter extends Model
{
    public string $table = "shelter";

    public array $attributes = [
        'id' => 'int',
        'shelter_name' => 'string',
        'city' => 'string',
        'img' => 'string',
        'description' => 'string'
    ];
}