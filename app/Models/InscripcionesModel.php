<?php

namespace App\Models;

use CodeIgniter\Model;

class InscripcionesModel extends Model
{
    protected $table            = 'Inscripciones';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_usuario', 'id_clase', 'telefono', 'fecha_inicio'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    
    public function getAllInscripciones()
{
    return $this->select('Inscripciones.id, usuarios.nombres as nombre_usuario, usuarios.apellidos as apellido_usuario, 
    Inscripciones.telefono, Clases.id_instructor, Instructores.nombres as nombre_instructor, Instructores.apellidos as apellido_instructor,
    Clases.id_especialidad, Especialidades.nombres as nombre_especialidad, 
    Inscripciones.fecha_inicio')
    ->join('usuarios', 'usuarios.id = Inscripciones.id_usuario')
    ->join('clases', 'clases.id = Inscripciones.id_clase')
    ->join('especialidades', 'especialidades.id = clases.id_especialidad')
    ->join('instructores', 'instructores.id = clases.id_instructor') // Aquí se une la tabla Instructores
    ->findAll();
}


// Metodo para obtener el nombre de las especialidade



//      public function getAllInscripciones()
//      {
//          return $this->select('Inscripciones.id, usuarios.nombres as nombre_usuario, usuarios.apellidos as apellido_usuario, 
//          Inscripciones.telefono, Clases.id_instructor as instructor_nombre, Clases.id_instructor as instructor_apellido, Especialidades.nombres as nombre_especialidad, 
//          Inscripciones.fecha_inicio')
//  ->join('usuarios', 'usuarios.id = Inscripciones.id_usuario')
//  ->join('clases', 'clases.id = Inscripciones.id_clase')
//  ->join('especialidades', 'especialidades.id = clases.id_especialidad')
//  ->findAll();
//      }

//     public function getClaseById($id)
//     {
//         return $this->where('id', $id)->first();
//     }
    
    
}    
