<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\PasswordResetNotification;
use Carbon\Carbon;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class User extends Authenticatable
{
    use HasFactory, Notifiable, CanResetPassword, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();
        self::creating(fn($model) => $model->password = Hash::isHashed($model->password) ? $model->password :
            bcrypt($model->password));
    }

    public function sendPasswordResetNotification($token): void
    {
        $url = route('auth.password.reset', ['token' => $token, 'email' => $this->email]);
        $this->notify(new PasswordResetNotification($url));
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function image(): Attribute
    {
        return new Attribute(get: fn($value) => $value ? Storage::disk('users')->url($value) :
            asset('images/profile.svg'));
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('active', true);
    }

    public function scopeInactive(Builder $query)
    {
        return $query->where('active', false);
    }

    public function scopeAdults(Builder $query)
    {
        return $query->where('birthday', '<=', Carbon::now()->subYears(18));
    }

    public function scopeTodaysBirthday(Builder $query)
    {
        return $query->whereMonth('birthday', date('m'))
                     ->whereDay('birthday', date('d'));
    }

}
