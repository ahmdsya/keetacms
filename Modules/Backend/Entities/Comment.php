<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'parent', 'post_id', 'nama', 'email', 'website', 'content', 'publikasi'
    ];
}
