<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Halaman extends Model
{
    protected $fillable = [
    	'judul','slug', 'isi','judul_seo', 'deskripsi','keyword', 'status', 'gambar', 'author'
    ];

    public function setJudulAttribute($value)
    {
        $this->attributes['judul'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
