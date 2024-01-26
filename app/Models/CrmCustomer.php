<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CrmCustomer extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'crm_customers';

    protected $hidden = [
        'password',
        'vps_password',
    ];

    protected $dates = [
        'last_deposit_time',
        'last_withdraw_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'platform_type_label',
        'a_b_stock_label',
        'connect_status_label',
        'archive_status_label',
    ];

    public const PLATFORM_TYPE_SELECT = [
        [
            'label' => 'MT4',
            'value' => '1',
        ],
        [
            'label' => 'MT5',
            'value' => '2',
        ],
    ];

    public const A_B_STOCK_SELECT = [
        [
            'label' => 'A 仓',
            'value' => '1',
        ],
        [
            'label' => 'B 仓',
            'value' => '2',
        ],
    ];

    public const CONNECT_STATUS_SELECT = [
        [
            'label' => '启动',
            'value' => '1',
        ],
        [
            'label' => '停止',
            'value' => '2',
        ],
    ];

    public const ARCHIVE_STATUS_RADIO = [
        [
            'label' => '正常使用',
            'value' => '1',
        ],
        [
            'label' => '归档账号',
            'value' => '2',
        ],
    ];

    protected $orderable = [
        'id',
        'platform',
        'platform_type',
        'trade_account',
        'status.name',
        'a_b_stock',
        'name',
        'last_deposit_time',
        'deposit_amount',
        'withdraw_account',
        'last_withdraw_time',
        'withdraw_amount',
        'belong.user_name',
        'ib',
        'second_ib',
        'bonus',
        'rebate',
        'email',
        'mobile',
        'vps',
        'vps_account',
        'mm_strategy',
        'mm_mutiple',
        'trade_strategy',
        'trade_multiple',
        'leverage',
        'predict_rebate',
        'total_profit',
        'day_profit',
        'total_volume',
        'balance',
        'equity',
        'floating',
        'order_number',
        'missing',
        'connect_status',
        'comment',
        'archive_status',
    ];

    protected $filterable = [
        'id',
        'platform',
        'platform_type',
        'trade_account',
        'status.name',
        'a_b_stock',
        'name',
        'last_deposit_time',
        'deposit_amount',
        'withdraw_account',
        'last_withdraw_time',
        'withdraw_amount',
        'belong.user_name',
        'ib',
        'second_ib',
        'bonus',
        'rebate',
        'email',
        'mobile',
        'vps',
        'vps_account',
        'mm_strategy',
        'mm_mutiple',
        'trade_strategy',
        'trade_multiple',
        'leverage',
        'predict_rebate',
        'total_profit',
        'day_profit',
        'total_volume',
        'balance',
        'equity',
        'floating',
        'order_number',
        'missing',
        'connect_status',
        'comment',
        'archive_status',
    ];

    protected $fillable = [
        'platform',
        'platform_type',
        'trade_account',
        'password',
        'status_id',
        'a_b_stock',
        'name',
        'last_deposit_time',
        'deposit_amount',
        'withdraw_account',
        'last_withdraw_time',
        'withdraw_amount',
        'belong_id',
        'ib',
        'second_ib',
        'bonus',
        'rebate',
        'email',
        'mobile',
        'vps',
        'vps_account',
        'vps_password',
        'mm_strategy',
        'mm_mutiple',
        'trade_strategy',
        'trade_multiple',
        'leverage',
        'predict_rebate',
        'total_profit',
        'day_profit',
        'total_volume',
        'balance',
        'equity',
        'floating',
        'order_number',
        'missing',
        'connect_status',
        'comment',
        'archive_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getPlatformTypeLabelAttribute()
    {
        return collect(static::PLATFORM_TYPE_SELECT)->firstWhere('value', $this->platform_type)['label'] ?? '';
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function status()
    {
        return $this->belongsTo(CrmStatus::class);
    }

    public function getABStockLabelAttribute()
    {
        return collect(static::A_B_STOCK_SELECT)->firstWhere('value', $this->a_b_stock)['label'] ?? '';
    }

    public function getLastDepositTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setLastDepositTimeAttribute($value)
    {
        $this->attributes['last_deposit_time'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getLastWithdrawTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setLastWithdrawTimeAttribute($value)
    {
        $this->attributes['last_withdraw_time'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function belong()
    {
        return $this->belongsTo(User::class);
    }

    public function setVpsPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['vps_password'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function getConnectStatusLabelAttribute()
    {
        return collect(static::CONNECT_STATUS_SELECT)->firstWhere('value', $this->connect_status)['label'] ?? '';
    }

    public function getArchiveStatusLabelAttribute()
    {
        return collect(static::ARCHIVE_STATUS_RADIO)->firstWhere('value', $this->archive_status)['label'] ?? '';
    }
}
