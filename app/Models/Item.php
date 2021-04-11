<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id', 'added_by', 'description', 'brand', 'quantity'
    ];

    /**
     * Scope a query to only not deleted records.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExists($query)
    {
        return $query->select([
            'id',
            'type_id',
            'added_by',
            'brand',
            'description',
            'quantity',
            'created_at',
            'updated_at'
        ]);
    }

    /**
     * Get related user's
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    /**
     * Get related item type's
     *
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(ItemType::class, 'type_id');
    }
}
