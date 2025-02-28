<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizItemOption extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quiz_item_options';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'quiz_item_id',
        'order',
        'value',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'order' => 'integer',
        'quiz_item_id' => 'integer',
    ];

    /**
     * Get the quiz item that owns the option.
     */
    public function quizItem(): BelongsTo
    {
        return $this->belongsTo(QuizItem::class);
    }

    /**
     * Scope a query to order options by their display order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Scope a query to find options by value.
     */
    public function scopeWithValue($query, $value)
    {
        return $query->where('value', $value);
    }

    /**
     * Get the quiz through the quiz item.
     */
    public function quiz()
    {
        return $this->quizItem->quiz;
    }
}
