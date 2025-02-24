<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $table = 'music'; 

    protected $fillable = [
        'name',
        'author',
        'image_path',
        'music_path',
        'like',
        'listen',
        'duration',
        'download'
    ];
    public $timestamps = false;
}
