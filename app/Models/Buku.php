<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = "bukus";
    protected $fillable = [
        "judul_buku",
        "penulis",
        "no_buku"
    ];
}
