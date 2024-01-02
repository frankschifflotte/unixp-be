<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'gender',
        'date_of_birth',
        'avatarurl',
        'student_id',
        'class',
        'school',
        'school_year',
        'about_me',
        'ispublic',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function questions()
    {
        $this->hasMany(Question::class, 'user_id', 'id');
    }

    public function answers()
    {
        $this->hasMany(Answer::class, 'answer_id', 'id');
    }

    public function likes()
    {
        $this->hasMany(Like::class,'user_id', 'id');
    }

    public function receivedNotifications()
    {
        $this->hasMany(Notification::class, 'recipient_id', 'id');
    }
}
