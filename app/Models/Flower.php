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
 * Class Flower
 *
 * @property int $id
 * @property string $category
 * @property string $name
 * @property string|null $name_scientific
 * @property Carbon|null $period_bloom_start
 * @property Carbon|null $period_bloom_end
 * @property Carbon|null $period_plant_start
 * @property Carbon|null $period_plant_end
 * @property string|null $colors
 * @property string|null $pot_sizes
 * @property string|null $height
 * @property string|null $origin
 * @property string|null $destination
 * @property string|null $water
 * @property string|null $temperature
 * @property string|null $slug
 * @property float|null $price
 * @property string|null $code
 * @property string $availability
 * @property float $stock
 * @property float $importance
 * @property int|null $shop_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Shop|null $shop
 * @property Collection|Order[] $orders
 * @property Collection|Tag[] $tags
 *
 * @package App\Models
 */
class Flower extends Model
{
	protected $table = 'flowers';

	protected $casts = [
		'price' => 'float',
		'stock' => 'float',
		'importance' => 'float',
		'shop_id' => 'int'
	];

	protected $dates = [
		'period_bloom_start',
		'period_bloom_end',
		'period_plant_start',
		'period_plant_end'
	];

	protected $fillable = [
		'category',
		'name',
		'name_scientific',
		'period_bloom_start',
		'period_bloom_end',
		'period_plant_start',
		'period_plant_end',
		'colors',
		'pot_sizes',
		'height',
		'origin',
		'destination',
		'water',
		'temperature',
		'slug',
		'price',
		'code',
		'availability',
		'stock',
		'importance',
		'shop_id'
	];

	public function shop()
	{
		return $this->belongsTo(Shop::class);
	}

	public function orders()
	{
		return $this->belongsToMany(Order::class, 'order_to_flower')
					->withPivot('id')
					->withTimestamps();
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class, 'tag_to_flower')
					->withPivot('id')
					->withTimestamps();
	}

    protected static function booted()
    {
        static::creating(function (Flower $model) {
            $model->code = $model->name."-".Str::random(6);
            $model->slug = Str::slug($model->code);
        });

        static::updating(function (Flower $model) {
            if ($model->orders()->exists()) {
                $oldValue = new Flower($model->getRawOriginal());
                $oldValue->stock = 0;
                $oldValue->availability = 0;
                $oldValue->save();
                $model->code = $model->name."-".Str::random(6);
                $model->slug = Str::slug($model->code);
            }
        });
    }
}
