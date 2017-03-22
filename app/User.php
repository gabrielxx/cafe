<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'status',
        'role',
        'phone_number',
        'image',
        'created_at',
        'updated_at'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Full Name Attribute.
     *
     * @return fullname
     */
    public function getFullnameAttribute(){

        return $this->first_name." ".$this->last_name;
    }


    /**
     * User belongs to Company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(){

        // belongsTo(RelatedModel, foreignKey = company_id, keyOnRelatedModel = id)
        return $this->belongsTo(Company::class);
    }
}
