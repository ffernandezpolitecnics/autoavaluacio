<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rubrica extends Model
{
    //
    protected $table = 'rubriques';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    /**
     * Get the competencia that owns the Rubrica
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function competencia(): BelongsTo
    {
        return $this->belongsTo(Competencia::class, 'id_pregunta');
    }
}
