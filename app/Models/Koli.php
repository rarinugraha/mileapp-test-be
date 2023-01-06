<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Koli extends Model
{
    use HasFactory;

    protected $primaryKey = 'koli_id';
    protected $fillable = [
        'koli_id',
        'koli_length',
        'awb_url',
        'koli_chargeable_weight',
        'koli_width',
        'koli_surcharge',
        'koli_height',
        'koli_description',
        'koli_formula_id',
        'connote_id',
        'koli_volume',
        'koli_weight',
        'koli_custom_field',
        'koli_code',
    ];
}
