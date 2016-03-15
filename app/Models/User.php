<?php

namespace App\Models;

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
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo('App\Models\Role');
    }
    public function state() {
        return $this->belongsTo('App\Models\State');
    }

    public function city() {
        return $this->belongsTo('App\Models\City');
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function isUser($role_name) {
      if ($this->role->name == $role_name) {
        return true;
      }
        return false;
    }

    public function getId() {
      return $this->user->id;
    }



}
