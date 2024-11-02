<?php

namespace App;

class Session
{
    public $session_id;
    public $user_id;
    public function __construct(int $user_id,)
    {
        $this->user_id = $user_id;
    }
}