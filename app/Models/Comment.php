<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment', 'content_id', 'content_type', 'parent_id', 'status'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class, 'content_id', 'id');
    }
}
