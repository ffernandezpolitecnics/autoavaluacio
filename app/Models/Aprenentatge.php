<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aprenentatge extends Model
{
    //
    protected $table = 'aprenentatges';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    /**
     * Get the modul that owns the Aprenentatge
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modul(): BelongsTo
    {
        return $this->belongsTo(Modul::class, 'id_modul');
    }

    /**
     * Get all of the competencies for the Aprenentatge
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function competencies(): HasMany
    {
        return $this->hasMany(Competencia::class, 'id_aprenentatge');
    }
}
