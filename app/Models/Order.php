<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property int $id
 * @property string $invoice
 * @property string|null $destination
 * @property string $payment_status
 * @property string $payment_method
 * @property string $delivery_status
 * @property float|null $value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $customer_id
 *
 * @property Customer|null $customer
 * @property Collection|Flower[] $flowers
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';

	protected $casts = [
		'value' => 'float',
		'customer_id' => 'int'
	];

	protected $fillable = [
		'invoice',
		'destination',
		'payment_status',
		'payment_method',
		'delivery_status',
		'value',
		'customer_id'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function flowers()
	{
		return $this->belongsToMany(Flower::class, 'order_to_flower')
					->withPivot('id')
					->withTimestamps();
	}
}
