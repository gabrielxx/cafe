<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model {

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id',
	    'name',
		'phone_number',
		'image',
		'category',
		'type',
		'status',
		'company_id',
		'created_at',
		'updated_at'
	];


	/**
	 * Driver belongs to Company.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function company(){

		// belongsTo(RelatedModel, foreignKey = company_id, keyOnRelatedModel = id)
		return $this->belongsTo(Company::class);
	}

	/**
	 * Driver has many Services.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function services(){

		// hasMany(RelatedModel, foreignKeyOnRelatedModel = driver_id, localKey = id)
		return $this->hasMany(Service::class);
	}

	/**
	 * Driver has many Services.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function paysheet(){

		// hasMany(RelatedModel, foreignKeyOnRelatedModel = driver_id, localKey = id)
		return $this->hasMany(Service::class, 'internal_drivel_id');
	}
}
