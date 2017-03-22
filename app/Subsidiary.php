<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
		'rif',
		'status',
		'company_id',
	];

	/**
	 * Subsidiary belongs to Company.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function company(){

		// belongsTo(RelatedModel, foreignKey = company_id, keyOnRelatedModel = id)
		return $this->belongsTo(Company::class);
	}

	/**
	 * Subsidiary has many Services.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function services(){

		// hasMany(RelatedModel, foreignKeyOnRelatedModel = subsidiary_id, localKey = id)
		return $this->hasMany(Service::class);
	}
}
