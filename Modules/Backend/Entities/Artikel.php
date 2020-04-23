<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = [
    	'judul','slug', 'isi','judul_seo', 'deskripsi', 'keyword', 'status', 'kategori', 'gambar','author', 'hits', 'show_comment'
    ];

    public function setJudulAttribute($value)
    {
        $this->attributes['judul'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
