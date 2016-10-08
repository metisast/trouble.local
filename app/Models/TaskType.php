<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskType extends Model
{
    /* Queries */
    static public function getAllTypes()
    {
        return parent::all();
    }
}
