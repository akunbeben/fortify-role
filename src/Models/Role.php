<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'redirect_to',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
