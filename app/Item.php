<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'route_id',
		'km',
		'factor',
		'night',
		'holiday',
		'subtotal',
		'service_id',
	];


    /**
     * Item belongs to Service.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service(){

    	// belongsTo(RelatedModel, foreignKey = service_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Service::class);
    }

    /**
     * Item belongs to Route.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function route(){

        // belongsTo(RelatedModel, foreignKey = route_id, keyOnRelatedModel = id)
        return $this->belongsTo(Route::class);
    }
}
