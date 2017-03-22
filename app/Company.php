<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'rif',
        'image',
        'email',
        'web',
        'phone_number',
        'address',
        'owner',
        'status',
        'created_at',
        'updated_at'
    ];


	/**
	 * Company has many Users.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function users(){

		// hasMany(RelatedModel, foreignKeyOnRelatedModel = company_id, localKey = id)
		return $this->hasMany(User::class);
	}


    /**
     * Company has many Drivers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function drivers(){

        // hasMany(RelatedModel, foreignKeyOnRelatedModel = company_id, localKey = id)
        return $this->hasMany(Driver::class);
    }


    /**
     * Company has many Routes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function routes(){

        // hasMany(RelatedModel, foreignKeyOnRelatedModel = company_id, localKey = id)
        return $this->hasMany(Route::class);
    }


    /**
     * Company has many Subsidiaries.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subsidiaries(){

        // hasMany(RelatedModel, foreignKeyOnRelatedModel = company_id, localKey = id)
        return $this->hasMany(Subsidiary::class);
    }


    /**
     * Company has many Tabulators.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tabulators(){

        // hasMany(RelatedModel, foreignKeyOnRelatedModel = company_id, localKey = id)
        return $this->hasMany(Tabulator::class);
    }
}
