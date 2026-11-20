<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cicle extends Model
{
    //
    protected $table      = 'cicles';
    protected $primaryKey = 'id';
    public $incrementing  = true;
    public $timestamps    = false;

    /**
     * The moduls that belong to the Cicle
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function moduls(): BelongsToMany
    {
        // return $this->belongsToMany(Modul::class, 'cicles_moduls', 'id_cicle', 'id_modul');
        return $this->belongsToMany(Modul::class, 'cicles_moduls', 'id_cicle', 'id_modul')->orderBy('codi', 'asc');
    }

}
