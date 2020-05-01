<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vivienda extends Model {

    /**
     * La tabla que guarda los posts
     *
     * @var string $table
     */
    protected $table = 'viviendas';

    /**
     * Clave primaria
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'id';

    /**
     * Tipo de dato de la clave primaria
     *
     * @var string $keyType
     */
    protected $keyType = 'int';

    /**
     * Id auto-increment
     *
     * @var bool $incrementing
     */
    public $incrementing = true;

    /**
     * Estaablece si se guarda la fecha en la que se guarda el post o se actualiza
     *
     * @var bool $timestamps
     */
    public $timestamps = true;

    /**
     * Formato de la fecha de creacion y actualizacion
     *
     * @var string $dateFormat
     */
    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * Campos del post
     *
     * @var array $fillable
     */
    protected $fillable = [
        'titulo',
        'precio',
        'descripcion',
        'valoracion',
        'usuario',
    ];

    public function usuario() {
        return $this->belongsTo(User::class, 'usuario');
    }

    public function valoracion() {

    }
}
