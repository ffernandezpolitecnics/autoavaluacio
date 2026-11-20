<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Competencia extends Model
{
    //
    protected $table = 'competencies';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    /**
     * Get the aprenentatge that owns the Competencia
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aprenentatge(): BelongsTo
    {
        return $this->belongsTo(Aprenentatge::class, 'id_aprenentatge');
    }

    /**
     * The Usuari that belong to the Competencia
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Usuari(): BelongsToMany
    {
        return $this->belongsToMany(Usuari::class, 'usuaris_competencies', 'id_competencia', 'id_usuari')
        ->wherePivot('data', 'nivell');
    }

    /**
     * Get all of the rubriques for the Competencia
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rubriques(): HasMany
    {
        return $this->hasMany(Rubrica::class, 'id_pregunta');
    }
}
