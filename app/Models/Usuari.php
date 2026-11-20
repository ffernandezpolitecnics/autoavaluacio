<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Usuari extends Model
{
    //
    protected $table = 'usuaris';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    /**
     * Get the rol that owns the Usuari
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol(): BelongsTo
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    /**
     * The competencies that belong to the Usuari
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function competencies(): BelongsToMany
    {
        return $this->belongsToMany(Competencia::class, 'usuaris_competencies', 'id_usuari', 'id_competencia');
    }
}
