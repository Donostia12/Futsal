<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lapangan extends Model
{
    use HasFactory;
    protected $table = "lapangan";
    protected $fillable = ['nama','latitude','longitude','telp','harga','id_kecamatan','desc','alamat'];
}
