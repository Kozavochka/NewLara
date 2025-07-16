<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $source_id
 * @property string $source_type
 *
 *
 * @property Apartment $source
 */
class RealEstateEntity extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'source_id',
      'source_type',
    ];

    public function source(): MorphTo
    {
        return $this->morphTo();
    }
}
