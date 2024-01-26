<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasAdvancedFilter, SoftDeletes, Notifiable, HasFactory;

    public $table = 'users';

    protected $appends = [
        'status_label',
    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'name',
        'user_name',
        'email',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $filterable = [
        'id',
        'name',
        'user_name',
        'email',
        'roles.title',
        'status',
        'created_at',
        'updated_at',
    ];

    public const STATUS_RADIO = [
        [
            'label' => '正常',
            'value' => '1',
        ],
        [
            'label' => '禁止',
            'value' => '2',
        ],
    ];

    protected $fillable = [
        'name',
        'password',
        'user_name',
        'email',
        'email_verified_at',
        'status',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('title', 'Admin')->exists();
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getStatusLabelAttribute()
    {
        return collect(static::STATUS_RADIO)->firstWhere('value', $this->status)['label'] ?? '';
    }
}
