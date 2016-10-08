<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /* Queries */
    static public function getAllRooms()
    {
        return parent::orderBy('title')->get();
    }
}
