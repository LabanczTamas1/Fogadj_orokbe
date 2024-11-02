<?php
namespace App\Models;

use App\Model;

class Form extends Model
{
    public string $table = "form";

    public array $attributes = [
        'id' => 'int',
        'fullname' => 'string',
        'email' => 'string',
        'message' => 'string',
        'pet_id' => 'int',
        'shelter_id' => 'int'
    ];
}