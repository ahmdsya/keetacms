<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['nama','slug', 'keterangan'];

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
