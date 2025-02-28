<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'quiz_id',
        'title',
        'value',
        'body',
        'url',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'quiz_id' => 'integer',
    ];

    /**
     * Get the quiz that owns the result.
     */
    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    /**
     * Scope a query to find results by value.
     */
    public function scopeWithValue($query, $value)
    {
        return $query->where('value', $value);
    }

    /**
     * Scope a query to find results for a specific quiz.
     */
    public function scopeForQuiz($query, $quizId)
    {
        return $query->where('quiz_id', $quizId);
    }

    /**
     * Check if the result has a URL.
     */
    public function hasUrl(): bool
    {
        return !empty($this->url);
    }

    /**
     * Check if the result has a body.
     */
    public function hasBody(): bool
    {
        return !empty($this->body);
    }

    /**
     * Get a truncated version of the body.
     */
    public function getSummary($length = 100): string
    {
        if (empty($this->body)) {
            return '';
        }

        return strlen($this->body) > $length
            ? substr($this->body, 0, $length) . '...'
            : $this->body;
    }
}
