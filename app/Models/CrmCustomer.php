<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CrmCustomer extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'crm_customers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'first_name',
        'last_name',
        'status.name',
        'email',
        'phone',
        'address',
        'skype',
        'website',
        'description',
    ];

    protected $filterable = [
        'id',
        'first_name',
        'last_name',
        'status.name',
        'email',
        'phone',
        'address',
        'skype',
        'website',
        'description',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'status_id',
        'email',
        'phone',
        'address',
        'skype',
        'website',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function status()
    {
        return $this->belongsTo(CrmStatus::class);
    }
}
