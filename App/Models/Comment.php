<?php
namespace App\Models;

use App\Model;

class Comment extends Model
{
    public string $table = "comment";

    public array $attributes = [
        'id' => 'int',
        'comment' => 'string',
        'user_id' => 'int',
        'shelter_id' => 'int'
    ];
}