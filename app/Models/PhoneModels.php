<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneModels extends Model
{
    use HasFactory;
    protected $table = 'phonemodels';
    protected $primaryKey = 'id';

    protected $fillable = [
        'phoneName',
        'overview',
        'quantity',
        'modelLogo',
        'brandId',
        'userId'
    ];


    public function PhoneBrands()
    {
        return $this->hasOne(PhoneBrands::class, 'id', 'brandId');
    }
    public function Users()
    {
        return $this->hasOne(User::class, 'id', 'userId');
    }

}
