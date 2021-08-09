<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class Api
 *
 * @property int $id
 * @property string $name
 * @property string $token
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Shop[] $shops
 *
 * @package App\Models
 */
class Api extends Model
{
	protected $table = 'apis';

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'name',
		'token',
		'status'
	];

	public function shops()
	{
		return $this->belongsToMany(Shop::class, 'api_to_shop')
					->withPivot('id')
					->withTimestamps();
	}

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->token = Str::random(32);
        });
    }
}
