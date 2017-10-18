<?php

namespace DoeSangue\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use DoeSangue\Models\Campaign;
use DoeSangue\Models\Donor;
use DoeSangue\Models\Invite;
use DoeSangue\Models\Comment;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                            'first_name',
                            'last_name',
                            'email',
                            'username',
                            'phone',
                            'bio',
                            'birthdate',
                            'active',
                            'password',
                          ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
                          'password',
                          'remember_token',
                          'created_at',
                          'updated_at',
                          'deleted_at',
                          'id',
                          'phone',
                          'active',
                          'username',
                          'is_active',
                          'birthdate',
                          'email'
                        ];

    /**
     * The dates attributes.
     *
     * @var array $dates
     */
    protected $dates = [
      'created_at', 'updated_at', 'deleted_at'
    ];

    protected $appends = [ 'is_active' ];

    /**
     * Returns the full name of user.
     *
     * @return string
     */
    public function getFullNameAttribute($value)
    {
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }

    /**
     * Returns the campaigns created by the user.
     *
     * @return array relationship
     * @var    array
     */
    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function donor()
    {
        return $this->hasOne(Donor::class);
    }

    /**
     * Return as Many invites created by user.
     */
    public function invites()
    {
        return $this->hasMany(Invite::class);
    }

    /**
     * Returns the comments created by the user.
     *
     * @return array relationship
     * @var    array
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getIsActiveAttribute()
    {
        return $this->attributes[ 'active' ] == true;
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
public function getRouteKeyName()
{
    return 'username';
}
}
