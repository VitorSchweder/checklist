<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class CakeInterestedList extends Model
{
    protected $table = 'cakes_interested_list';

    protected $fillable = [
        'email',
        'cake_id',      
    ];

    protected $casts = [        
        'cake_id' => 'int',
    ];

    public function cake(): BelongsTo
    {
        return $this->belongsTo(Cake::class);
    }
}
