<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    protected $fillable = [
        'name',
        'weight',
        'price',
        'available_quantity'
    ];
    
    protected $casts = [
        'weight' => 'float',
        'price' => 'float',
        'available_quantity' => 'int',
    ];

    public function cakeInterestedList(): HasMany
    {
        return $this->hasMany(cakeInterestedList::class);
    }
}
