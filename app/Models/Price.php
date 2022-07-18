<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public $table = 'prices';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'mmr',
        'caroffer',
        'blackbook',
        'retail',
        'car.model',
    ];

    protected $filterable = [
        'id',
        'mmr',
        'caroffer',
        'blackbook',
        'retail',
        'car.model',
    ];

    protected $fillable = [
        'mmr',
        'caroffer',
        'blackbook',
        'retail',
        'car_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
