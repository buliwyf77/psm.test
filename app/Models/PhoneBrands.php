<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneBrands extends Model
{
    use HasFactory;

    protected $table = 'phonebrands';
    protected $primaryKey = 'id';

    protected $fillable = [
        'brandName',
        'origin',
        'brandLogo',
        'userId'
    ];

    public function PhoneModels() {
        return $this->hasMany(PhoneModels::class);
    }
}
