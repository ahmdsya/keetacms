<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    protected $fillable = [
    	'judul', 'tipe', 'sort', 'meta_id', 'konten'
    ];
}
