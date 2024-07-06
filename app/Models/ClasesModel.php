<?php

namespace App\Models;

use CodeIgniter\Model;

class ClasesModel extends Model
{
    protected $table            = 'Clases';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_instructor', 'fecha_inicio', 'fecha_fin', 'descripcion', 'id_especialidad'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;

    public function getClasesConInstructoresYEspecialidades()
    {
        return $this->select('Clases.*, Instructores.nombres AS nombre_instructor, Instructores.apellidos AS apellido_instructor, Especialidades.nombres AS nombre_especialidad')
            ->join('Instructores', 'Clases.id_instructor = Instructores.id')
            ->join('Especialidades', 'Clases.id_especialidad = Especialidades.id')
            ->findAll();
    }
       

}    
