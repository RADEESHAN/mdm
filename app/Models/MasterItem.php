<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'brand_id',
        'category_id',
        'code',
        'name',
        'attachment',
        'status',
        'user_id',
    ];

    /**
     * Get the user that owns the item.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the brand associated with the item.
     */
    public function brand()
    {
        return $this->belongsTo(MasterBrand::class, 'brand_id');
    }

    /**
     * Get the category associated with the item.
     */
    public function category()
    {
        return $this->belongsTo(MasterCategory::class, 'category_id');
    }
}