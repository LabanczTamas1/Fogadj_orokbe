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
        'shelter_id' => 'int',
        'user_id' => 'int',
        'slug' => 'string'
    ];
    public function ownsByTheUser(int $user_id): bool
    {
        

        return $this->user_id == $user_id;
    }
}