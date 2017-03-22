<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'order',
		'ccoo',
		'user',
		'user_id',
		'phone_number',
		'contact',
		'approver',
		'approver_id',
		'week',
		'area',
		'type',
		'start_date',
		'end_date',
		'laggard',
		'payment',
		'condition',
		'status',
		'route_id',
		'driver_id',
		'internal_driver_id',
		'subsidiary_id',
		'company_id',
		'position'
	];



	/**
	 * Service belongs to Route.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function route(){

		// belongsTo(RelatedModel, foreignKey = route_id, keyOnRelatedModel = id)
		return $this->belongsTo(Route::class);
	}

	/**
	 * Service belongs to Driver.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function driver(){

		// belongsTo(RelatedModel, foreignKey = driver_id, keyOnRelatedModel = id)
		return $this->belongsTo(Driver::class);
	}

	/**
	 * Service belongs to Driver.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function internal(){

		// belongsTo(RelatedModel, foreignKey = driver_id, keyOnRelatedModel = id)
		return $this->belongsTo(Driver::class, 'internal_driver_id');
	}

	/**
	 * Service belongs to Subsidiary.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function subsidiary(){

		// belongsTo(RelatedModel, foreignKey = subsidiary_id, keyOnRelatedModel = id)
		return $this->belongsTo(Subsidiary::class);
	}

	/**
	 * Service belongs to Company.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function company(){

		// belongsTo(RelatedModel, foreignKey = company_id, keyOnRelatedModel = id)
		return $this->belongsTo(Company::class);
	}


	/**
	 * Service has one Invoice.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function invoice(){

		// hasOne(RelatedModel, foreignKeyOnRelatedModel = service_id, localKey = id)
		return $this->hasOne(Invoice::class);
	}

	/**
	 * Service has many Items.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function items(){

		// hasMany(RelatedModel, foreignKeyOnRelatedModel = service_id, localKey = id)
		return $this->hasMany(Item::class);
	}
}
