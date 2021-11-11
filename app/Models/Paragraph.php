<?php

namespace App\Models;

use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Paragraph
 * @package App\Models
 */
class Paragraph extends Model
{
    use HasFactory, SoftDeletes, Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'law_uuid',
        'chapter_uuid',
        'number',
        'title',
        'content'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var string[]
     */
    protected $hidden = [
        'id',
        'content',
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

    protected $appends = [
        'subparagraphs',
    ];

    /**
     * @return BelongsTo
     */
    public function law(): BelongsTo
    {
        return $this->belongsTo(Law::class, 'law_uuid', 'uuid');
    }

    /**
     * @return BelongsTo
     */
    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class, 'chapter_uuid', 'uuid');
    }

    public function getSubparagraphsAttribute(): array
    {
        return json_decode($this->content);
    }
}
