<?php

namespace Polashmahmud\Taggy\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Polashmahmud\Taggy\Scopes\TagUsedScopesTrait;

class Tag extends Model
{
    use HasFactory;
    use TagUsedScopesTrait;
}
