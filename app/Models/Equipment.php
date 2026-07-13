<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Equipment extends Model
{
   use HasFactory;
   
   //Allow mass assignment for these columns
   protected $fillable = [
    'name',
    'description',
    'serial_number',
    'status',
    'category_id',
    'purchase_date'
   ];

   //Each equipment belongs to a category
   public function category(): BelongsTo{
    return $this->belongsTo(Category::class);
   }

   // Query Scope to filter equipment by status
   public function scopeStatus(builder $query, string $status):
   Builder{
    return $query->where('status', $status);
   
   
    }

    // Query Scope to filter equipment by category
    public function scopeCategory(builder $query, int $categoryId): Builder{
        return $query->where('category_id', $categoryId);
    }
}
