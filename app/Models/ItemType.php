<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Contracts\ItemTypeContract as ModelContract;

class ItemType extends Model implements ModelContract
{
    use HasFactory;

    /**
     * keys of item types
     * 
     * @var array
     */
    const TYPES = [
        self::TYPE_BALLPOINT,
        self::TYPE_BOARD,
        self::TYPE_CUTTER,
        self::TYPE_CUTTER_FILL,
        self::TYPE_DUCT_TAPE,
        self::TYPE_ERASERS,
        self::TYPE_HIGHLIGHTER,
        self::TYPE_PENCILS,
        self::TYPE_MARKERS,
        self::TYPE_PAPER,
        self::TYPE_TYPE_X,
        self::TYPE_RULERS,
        self::TYPE_STAPLES,
        self::TYPE_STAPLES_FILL,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

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
     * Get formated item types name's
     *
     * @param  string $value
     * @return string
     */
    public function getNameAttribute(string $value): string
    {
        return Str::title($value);
    }
}
