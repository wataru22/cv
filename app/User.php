<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get user's profile
     *
     * return Profile
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get user's works
     *
     * return Work
     */
    public function works()
    {
        return $this->hasMany(Work::class)->orderBy('start', 'desc');
    }

    /**
     * Get user's schools
     *
     * return School
     */
    public function schools()
    {
        return $this->hasMany(School::class)->orderBy('start', 'desc');
    }

    /**
     * Get user's skills
     *
     * return Skill
     */
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    /**
     * Get user's awards
     *
     * return Award
     */
    public function awards()
    {
        return $this->hasMany(Award::class);
    }

    /**
     * Get user's interests
     *
     * return Interest
     */
    public function interests()
    {
        return $this->hasMany(Interest::class);
    }
}
