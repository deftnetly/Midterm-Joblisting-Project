<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings';

    protected $fillable = [
        'employer_id',
        'title',
        'salary',
    ];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'job_tag');
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        $search = trim($filters['search'] ?? '');
        $employer = trim($filters['employer'] ?? '');
        $tag = trim($filters['tag'] ?? '');

        return $query
            ->when($search !== '', function (Builder $query) use ($search) {
                $query->where(function (Builder $query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('salary', 'like', '%' . $search . '%')
                        ->orWhereHas('employer', function (Builder $query) use ($search) {
                            $query->where('name', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('tags', function (Builder $query) use ($search) {
                            $query->where('name', 'like', '%' . $search . '%');
                        });
                });
            })
            ->when($employer !== '', function (Builder $query) use ($employer) {
                $query->whereHas('employer', function (Builder $query) use ($employer) {
                    $query->where('name', $employer);
                });
            })
            ->when($tag !== '', function (Builder $query) use ($tag) {
                $query->whereHas('tags', function (Builder $query) use ($tag) {
                    $query->where('name', $tag);
                });
            });
    }
}
