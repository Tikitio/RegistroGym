<?php

namespace App\Models;

use CodeIgniter\Model;

class InstructoresModel extends Model
{
    protected $table            = 'Instructores';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombres', 'apellidos', 'sexo', 'telefono', 'id_especialidad'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;

      // Metodo para obtener el nombre de las especialidades
    public function instructoresEspecialidades()
    {
        return $this->select('Instructores.*, Especialidades.nombres AS id_especialidad')
            ->join('Especialidades', 'Instructores.id_especialidad = Especialidades.id')
            ->findAll();
    }
    

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
