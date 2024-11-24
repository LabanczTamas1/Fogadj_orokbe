<?php
namespace App\Models;

use App\Model;

class Shelter extends Model
{
    public string $table = "shelter";

    public array $attributes = [
        'id' => 'int',
        'shelter_name' => 'string',
        'shelter_slug' => 'string',
        'city' => 'string',
        'img' => 'string',
        'description' => 'string',
        'user_id'
    ];
    public function ownsByTheUser(int $user_id): bool
    {
        return $this->user_id == $user_id;
    }
}