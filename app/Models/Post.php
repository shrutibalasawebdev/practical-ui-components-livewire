<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Scope;

class Post extends Model
{
    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'category',
        'author_name',
        'published_at',
    ];

    protected function casts() : array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    #[Scope]
    public function category(Builder $query, ?string $category): void
    {
        if ($category) {
            $query->where('category', $category);
        }
    }

    #[Scope]
    public function search(Builder $query, ?string $term): void
    {
        if ($term) {
            $query->where(function ($q) use ($term) {
                $q->where('title', 'like', "%{$term}%")
                    ->orWhere('excerpt', 'like', "%{$term}%");
            });
        }
    }
}
