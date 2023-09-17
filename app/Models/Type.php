<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperType
 */
class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function wines()
    {
        $this->hasMany(Wine::class);
    }
}
