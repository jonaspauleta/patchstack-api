<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * The reason behind creating this model is just to
 * show the usage of Eloquent relationships.
 */
class Factor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'vulnerability_id',
    ];

    public function vulnerability(): BelongsTo
    {
        return $this->belongsTo(Vulnerability::class);
    }
}
