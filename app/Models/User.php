<?php

namespace App\Models;

use App\Models\Social\WallpaperComment;
use App\Models\Social\WallpaperLike;
use App\Models\Social\WallpaperReport;
use App\Notifications\User\UserResetPasswordNotification;
use App\Notifications\User\UserVerifyEmailNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Messages\MailMessage;

use Backpack\CRUD\CrudTrait;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements MustVerifyEmail, JWTSubject
{
    use CrudTrait;
    use Notifiable;
    use HasRoles;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token) {
        $this->notify(new UserResetPasswordNotification($token));
    }

    /**
     * Build the mail representation of the notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->line([
                trans('backpack.base.password_reset.line_1'),
                trans('backpack.base.password_reset.line_2'),
            ])
            ->action(trans('backpack.base.password_reset.button'), url(config('backpack.base.user').'/password/reset', $this->token))
            ->line(trans('backpack.base.password_reset.notice'));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification() {
        $this->notify(new UserVerifyEmailNotification());
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Return user's likes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneOrMany
     */
    public function likes()
    {
        return $this->hasMany(WallpaperLike::class, 'user_id');
    }

    /**
     * Return user's comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneOrMany
     */
    public function comments()
    {
        return $this->hasMany(WallpaperComment::class, 'user_id');
    }

    /**
     * Return user's reports
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneOrMany
     */
    public function reports()
    {
        return $this->hasMany(WallpaperReport::class, 'user_id');
    }
}
