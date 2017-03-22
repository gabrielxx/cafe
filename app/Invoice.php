<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'wait_night',
		'wait_daytime',
		'disposition_night',
		'disposition_daytime',
		'sprint_night',
		'sprint_daytime',
		'night_tour',
		'factor_wait_night',
		'factor_wait_daytime',
		'factor_disposition_night',
		'factor_disposition_daytime',
		'factor_sprint_night',
		'factor_sprint_daytime',
		'factor_night_tour',
		'wait_holiday',
		'wait_night_subtotal',
		'wait_daytime_subtotal',
		'disposition_holiday',
		'disposition_night_subtotal',
		'disposition_daytime_subtotal',
		'sprint_holiday',
		'sprint_night_subtotal',
		'sprint_daytime_subtotal',
		'night_tour_subtotal',
		'total',
		'total_routes',
		'overnight',
		'service_id',
	];

	/**
	 * Invoice belongs to Service.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function service(){

		// belongsTo(RelatedModel, foreignKey = service_id, keyOnRelatedModel = id)
		return $this->belongsTo(Service::class);
	}
}
