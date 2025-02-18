<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table            = 'Usuarios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombres', 'apellidos', 'sexo', 'telefono'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;

    // Metodo para obtener el nombre del sexo
    public function getSexo($sexo)
    {
        switch ($sexo) {
            case 1:
                return 'Masculino';
            case 2:
                return 'Femenino';
            case 3:
                return 'Otros';
            default:
                return 'Desconocido';
        }
    }
    
}
