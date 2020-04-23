<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
    	'menu', 'link', 'parent_id', 'type', 'sort'
    ];
}
