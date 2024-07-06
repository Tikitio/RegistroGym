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
    protected $allowedFields    = ['id_instructor', 'fecha_inicio', 'fecha_fin', 'descripcion'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;

    // Método para obtener el nombre de la especialidad
    public function obtenerEspecialidad($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT nombres FROM especialidades WHERE id = ?', [$id]);
        $result = $query->getRow();
        return $result ? $result->nombres : 'Desconocida';
    }

     // Método para obtener el nombre completo del Instructor
     public function obtenerInstructor($id)
     {
         $db = \Config\Database::connect();
         $query = $db->query('SELECT nombres, apellidos FROM instructores WHERE id = ?', [$id]);
         $result = $query->getRow();
         if ($result) {
             return $result->nombres . ' ' . $result->apellidos;
         }
         return 'Desconocido';
     }
}
