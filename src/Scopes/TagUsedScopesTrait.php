<?php

namespace Polashmahmud\Taggy\Scopes;

trait TagUsedScopesTrait
{
    public function scopeUsedGreaterThanEqual($query, $count)
    {
        return $query->where('count', '>=', $count);
    }

    public function scopeUsedGreaterThen($query, $count)
    {
        return $query->where('count', '>', $count);
    }

    public function scopeUsedLessThanEqual($query, $count)
    {
        return $query->where('count', '<=', $count);
    }

    public function scopeUsedLessThan($query, $count)
    {
        return $query->where('count', '<', $count);
    }
}
