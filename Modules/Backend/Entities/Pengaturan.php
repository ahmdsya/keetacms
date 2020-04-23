<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    protected $fillable = ['key', 'value', 'group'];
}
