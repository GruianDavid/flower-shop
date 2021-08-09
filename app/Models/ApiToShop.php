<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ApiToShop
 * 
 * @property int $id
 * @property int $api_id
 * @property int $shop_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Api $api
 * @property Shop $shop
 *
 * @package App\Models
 */
class ApiToShop extends Model
{
	protected $table = 'api_to_shop';

	protected $casts = [
		'api_id' => 'int',
		'shop_id' => 'int'
	];

	protected $fillable = [
		'api_id',
		'shop_id'
	];

	public function api()
	{
		return $this->belongsTo(Api::class);
	}

	public function shop()
	{
		return $this->belongsTo(Shop::class);
	}
}
