<?php
namespace App\Models;

use App\Model;

class Pet extends Model
{
    public string $table = "user";

    public array $attributes = [
        'id' => 'int',
        'username' => 'string',
        'email' => 'string',
        'password' => 'string',
        'type' => 'string',
        'shelter_id' => 'int'
    ];
}