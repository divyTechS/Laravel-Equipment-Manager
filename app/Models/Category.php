<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model
{
    //
    use HasFactory;

    //Allow mass assignment for these columns
    protected $fillable = ['name', 'description'];

    //One category can have many equipment items
    public function equipment(): HasMany{
        return $this->hasMany(Equipment::class);
    }
}
