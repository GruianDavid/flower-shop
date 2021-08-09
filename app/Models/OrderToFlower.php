<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderToFlower
 * 
 * @property int $id
 * @property int|null $order_id
 * @property int $flower_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Flower $flower
 * @property Order|null $order
 *
 * @package App\Models
 */
class OrderToFlower extends Model
{
	protected $table = 'order_to_flower';

	protected $casts = [
		'order_id' => 'int',
		'flower_id' => 'int'
	];

	protected $fillable = [
		'order_id',
		'flower_id'
	];

	public function flower()
	{
		return $this->belongsTo(Flower::class);
	}

	public function order()
	{
		return $this->belongsTo(Order::class);
	}
}
