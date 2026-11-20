<?php

namespace App\Models;

use App\Models\Cicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Modul extends Model
{
    //
    protected $table = 'moduls';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    /**
     * The cicles that belong to the Modul
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cicles(): BelongsToMany
    {
        return $this->belongsToMany(Cicle::class, 'cicles_moduls', 'id_modul', 'id_cicle');
    }

    /**
     * Get all of the aprenentatges for the Modul
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aprenentatges(): HasMany
    {
        return $this->hasMany(Aprenentatge::class, 'id_modul');
    }
}
