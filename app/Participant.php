<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = ['firstname', 'lastname', 'phone', 'email', 'passcode'];
}
