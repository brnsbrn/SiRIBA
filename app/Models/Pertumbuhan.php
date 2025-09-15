<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertumbuhan extends Model
{
    use HasFactory;

    protected $table = 'pertumbuhan';
    protected $primaryKey = 'id_pertumbuhan';
    public $timestamps = false;

    protected $fillable = [
        'periode',
        'jenis_data',
        'total',
    ];
}
