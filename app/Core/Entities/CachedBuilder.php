<?php

namespace App\Core\Entities;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Cache;

class CachedBuilder extends Builder
{
    public function get($columns = ['*'])
    {
        $value = $this->getCached();

        if (! is_null($value)) {
            return $value;
        }

        $model = parent::get($columns);

        if ($model->count()) {
            $this->setCached($model);
        }

        return $model;
    }

    public function getCached()
    {
        return $this->getCacheDriver()->get($this->getCacheKey());
    }

    public function setCached($model)
    {
        return $this->getCacheDriver()->forever($this->getCacheKey(), $model);
    }

    public function getCacheDriver()
    {
        return app('cache');
    }

    public function getCacheKey()
    {
        return $this->getCachePrefix() . ':' . $this->getCacheHash();
    }

    public function getCachePrefix()
    {
        return 'cached_' . $this->from;
    }

    public function getCacheHash()
    {
        $key = $this->connection->getName() . $this->toSql() . serialize($this->getBindings());

        return hash('sha256', $key);
    }
}
