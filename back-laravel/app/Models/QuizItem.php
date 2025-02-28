<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuizItem extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quiz_item';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'quiz_id',
        'type',
        'order',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => 'integer',
        'order' => 'integer',
        'quiz_id' => 'integer',
    ];

    /**
     * The quiz item types.
     */
    const TYPE_QUESTIONS = '1';
    const TYPE_ADVERTISE = '2';
    const TYPE_FREETEXT = '3';

    /**
     * Get the quiz that owns the quiz item.
     */
    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    /**
     * Get the options for the quiz item.
     */
    public function options(): HasMany
    {
        return $this->hasMany(QuizItemOption::class);
    }

    /**
     * Scope a query to only include items of a specific type.
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope a query to order items by their display order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Check if the item is a question.
     */
    public function isQuestion(): bool
    {
        return $this->type === self::TYPE_QUESTIONS;
    }

    /**
     * Check if the item is an advertisement.
     */
    public function isAdvertise(): bool
    {
        return $this->type === self::TYPE_ADVERTISE;
    }

    /**
     * Check if the item is a free text.
     */
    public function isFreeText(): bool
    {
        return $this->type === self::TYPE_FREETEXT;
    }
}
