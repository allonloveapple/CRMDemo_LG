<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CrmDocument extends Model implements HasMedia
{
    use HasAdvancedFilter, SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'crm_documents';

    protected $appends = [
        'document_file',
    ];

    protected $orderable = [
        'id',
        'customer.first_name',
        'name',
    ];

    protected $filterable = [
        'id',
        'customer.first_name',
        'name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'customer_id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function customer()
    {
        return $this->belongsTo(CrmCustomer::class);
    }

    public function getDocumentFileAttribute()
    {
        return $this->getMedia('crm_document_document_file')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }
}
