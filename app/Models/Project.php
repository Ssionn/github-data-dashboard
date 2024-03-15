<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'full_name',
        'description',
        'html_url',
        'git_url',
        'ssh_url',
        'clone_url',
        'owner',
        'project_id',
        'user_id',
        'pushed_at',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'pushed_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'project_id', 'project_id');
    }

    public function dateFormatted(): string
    {
        return $this->updated_at->format('d-m-Y');
    }
}
