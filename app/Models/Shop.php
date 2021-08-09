<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Shop
 * 
 * @property int $id
 * @property string $name
 * @property string|null $logo
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $description
 * @property string $reg_id
 * @property string|null $address
 * @property string|null $bank
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Api[] $apis
 * @property Collection|Flower[] $flowers
 *
 * @package App\Models
 */
class Shop extends Model
{
	protected $table = 'shops';

	protected $fillable = [
		'name',
		'logo',
		'email',
		'phone',
		'description',
		'reg_id',
		'address',
		'bank'
	];

	public function apis()
	{
		return $this->belongsToMany(Api::class, 'api_to_shop')
					->withPivot('id')
					->withTimestamps();
	}

	public function flowers()
	{
		return $this->hasMany(Flower::class);
	}
}
