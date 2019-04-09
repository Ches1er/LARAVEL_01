<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User_roles extends Model
{
    protected $table = 'user_roles';

    protected $fillable = ["user_id","role_id"];
}
