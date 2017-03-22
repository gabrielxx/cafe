<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabulator extends Model {


	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'km',
		'wait',
		'disposition',
		'sprint',
		'overnight',
		'detour',
		'shipping',
		'night',
		'holiday',
		'category',
		'status',
		'company_id',
	];


	/**
	 * Tabulator belongs to Company.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function company(){

		// belongsTo(RelatedModel, foreignKey = company_id, keyOnRelatedModel = id)
		return $this->belongsTo(Company::class);
	}
}
