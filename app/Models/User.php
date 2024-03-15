<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Event;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'github',
        'github_id',
        'github_token',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public static function generateUsername($username): string
    {
        if ($username === null) {
            $username = Str::lower(Str::random($length = 8));
        }

        if (User::where('username', $username)->exists()) {
            return User::generateUsername($username . Str::random(3));
        }

        return $username;
    }

    public function getImageUrl(): string
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name);
    }

    public function dateFormatted(): string
    {

        return 'Joined on ' . $this->created_at->format('jS') . ' of ' . $this->created_at->format('F, Y');
    }
}
