<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperWine
 */
class Wine extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'vintage', 'cepage_id', 'type_id', 'image'];

    public function cepage()
    {
        return $this->belongsTo(Cepage::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);  
    }
}
