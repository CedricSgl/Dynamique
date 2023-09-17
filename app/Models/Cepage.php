<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCepage
 */
class Cepage extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function wines()
    {
        $this->hasMany(Wine::class);
    }
}
