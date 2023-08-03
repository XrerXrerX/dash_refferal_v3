<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinksShorten extends Model
{
    use HasFactory;

    protected $table = 'links_shorten';
    protected $guarded = [];
}
