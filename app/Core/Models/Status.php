<?php

namespace App\Core\Models;
use App\Core\Entities\BaseModel;
use App\Core\Traits\Cacheable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends BaseModel
{
    use HasFactory, Cacheable;

    protected $table = 'status';

    const ACTIVE = 'active';
    const CANCELED = 'canceled';

    protected $fillable = [
        'name'
    ];

    protected $casts = [
        'id' => 'string',
        'is_active' => 'boolean',
    ];

    //scopes
    public function scopeType($builder, $name)
    {
        return $builder->where(['name' => $name])->first();
    }

    //acessors
    public function getDisplayNameAttribute()
    {
        return __("status.{$this->name}");
    }

    public function getIsActiveAttribute(): bool
    {
        return $this->name == self::ACTIVE;
    }
}
