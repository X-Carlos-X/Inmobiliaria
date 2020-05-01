<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViviendaFotos extends Model {

    protected $table = 'vivienda_fotos';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'vivienda_id',
        'foto_id'
    ];

    public function vivienda() {
        return $this->hasMany(Vivienda::class, 'vivienda_id');
    }

    public function foto() {
        return $this->hasMany(Foto::class, 'foto_id');
    }

}
