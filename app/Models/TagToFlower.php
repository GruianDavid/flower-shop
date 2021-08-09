<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TagToFlower
 * 
 * @property int $id
 * @property int $tag_id
 * @property int $flower_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Flower $flower
 * @property Tag $tag
 *
 * @package App\Models
 */
class TagToFlower extends Model
{
	protected $table = 'tag_to_flower';

	protected $casts = [
		'tag_id' => 'int',
		'flower_id' => 'int'
	];

	protected $fillable = [
		'tag_id',
		'flower_id'
	];

	public function flower()
	{
		return $this->belongsTo(Flower::class);
	}

	public function tag()
	{
		return $this->belongsTo(Tag::class);
	}
}
