<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    public function user() {
        return $this->belongsTo('\App\User');
    }
}
