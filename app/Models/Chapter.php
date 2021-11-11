<?php

namespace App\Models;

use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Chapter
 * @package App\Models
 */
class Chapter extends Model
{
    use HasFactory, SoftDeletes, Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'law_uuid',
        'number',
        'title'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var string[]
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var string[]
     */
    protected $with = [
        'paragraphs'
    ];

    /**
     * @return BelongsTo
     */
    public function law(): BelongsTo
    {
        return $this->belongsTo(Law::class, 'law_uuid', 'uuid');
    }

    /**
     * @return HasMany
     */
    public function paragraphs(): HasMany
    {
        return $this->hasMany(Paragraph::class, 'chapter_uuid', 'uuid');
    }
}
