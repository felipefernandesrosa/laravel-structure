<?php

namespace App\Core\Traits;

use App\Core\Entities\CachedBuilder;

/**
 * Trait Cacheable
 *
 * @package  App\Core\Traits
 */
trait Cacheable
{
    protected function newBaseQueryBuilder()
    {
        $connection = $this->getConnection();

        return new CachedBuilder(
            $connection, $connection->getQueryGrammar(), $connection->getPostProcessor(), $this
        );
    }
}