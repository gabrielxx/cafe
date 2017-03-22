<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model {

   	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
	    'route',
		'km',
		'company_id',
		'created_at',
		'updated_at'
	];

	/**
	 * Route belongs to Company.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function company(){

		// belongsTo(RelatedModel, foreignKey = company_id, keyOnRelatedModel = id)
		return $this->belongsTo(Company::class);
	}

	/**
	 * Route has many Services.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function services(){

		// hasMany(RelatedModel, foreignKeyOnRelatedModel = route_id, localKey = id)
		return $this->hasMany(Service::class);
	}
}


