<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quiz';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'type',
        'body',
        'number_options',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => 'integer',
        'status' => 'integer',
        'number_options' => 'integer',
    ];

    /**
     * The quiz types.
     */
    const TYPE_NORMAL = '1';
    const TYPE_EVALUATE = '2';
    const TYPE_CUSTOM = '3';

    /**
     * The quiz status.
     */
    const STATUS_ACTIVE = '1';
    const STATUS_INACTIVE = '9';

    /**
     * Get the items for the quiz.
     */
    public function items(): HasMany
    {
        return $this->hasMany(QuizItem::class);
    }

    /**
     * Get the results for the quiz.
     */
    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }

    /**
     * Scope a query to only include active quizzes.
     */
    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    /**
     * Scope a query to only include inactive quizzes.
     */
    public function scopeInactive($query)
    {
        return $query->where('status', self::STATUS_INACTIVE);
    }

    /**
     * Check if the quiz is active.
     */
    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    /**
     * Check if the quiz is inactive.
     */
    public function isInactive(): bool
    {
        return $this->status === self::STATUS_INACTIVE;
    }
}
