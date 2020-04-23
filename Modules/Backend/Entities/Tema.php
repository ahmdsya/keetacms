<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $fillable = [
    	'nama', 'status', 'screenshot',
    ];
}
