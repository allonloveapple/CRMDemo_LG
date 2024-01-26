<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'roles';

    protected $appends = [
        'customer_visible_label',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'title',
        'customer_visible',
        'customer_field_visible',
    ];

    protected $filterable = [
        'id',
        'title',
        'customer_visible',
        'customer_field_visible',
    ];

    protected $fillable = [
        'title',
        'customer_visible',
        'customer_field_visible',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const CUSTOMER_VISIBLE_RADIO = [
        [
            'label' => '全部账户',
            'value' => '1',
        ],
        [
            'label' => '仅自己归属',
            'value' => '2',
        ],
        [
            'label' => '不可见',
            'value' => '3',
        ],
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function getCustomerVisibleLabelAttribute()
    {
        return collect(static::CUSTOMER_VISIBLE_RADIO)->firstWhere('value', $this->customer_visible)['label'] ?? '';
    }
}
