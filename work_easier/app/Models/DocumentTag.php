<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DocumentTag extends Pivot
{
    protected $table = 'document_tags';
}
