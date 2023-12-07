<?php

namespace Polashmahmud\Taggy\Scopes;

trait TaggableScopesTrait
{
    public function scopeWithAnyTag($query, array $tags)
    {
        return $query->hasTags($tags);
    }

    public function scopeWithAllTags($query, array $tags)
    {
        foreach ($tags as $tag) {
            $query->hasTags([$tag]);
        }

        return $query;
    }

    public function scopeHasTags($query, array $tags)
    {
        return $query->whereHas('tags', function ($q) use ($tags) {
            $q->whereIn('slug', $tags);
        });
    }
}
