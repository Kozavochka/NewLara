<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @property int $id
 * @property int $source_id
 * @property string $source_type
 * @property string $value
 * @property string $value_type
 *
 *
 * @property Apartment $source
 *
 * @property-read string|float $preparedValue
 *
 */
class RealEstateEntityParameter extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'source_id',
        'source_type',
        'value',
        'value_type',
    ];

    public function source(): MorphTo
    {
        return $this->morphTo();
    }

    protected function preparedValue(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->value_type == 'string' ? $this->value : (float)$this->value; //TODO think about this
            },
        );
    }
}
