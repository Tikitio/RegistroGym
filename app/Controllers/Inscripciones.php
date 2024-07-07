<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InscripcionesModel;
use App\Models\UsuariosModel;
use App\Models\ClasesModel;
use App\Models\EspecialidadesModel;
use App\Models\InstructoresModel;

class Inscripciones extends BaseController
{
    protected $helpers = ['form'];
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $inscripcionesModel = new InscripcionesModel();
        $data['inscripciones'] = $inscripcionesModel->getAllInscripciones();

        return view('inscripciones/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
       // Instanciar los modelos
    $usuariosModel = new UsuariosModel();
    $clasesModel = new ClasesModel();
    $especialidadesModel = new EspecialidadesModel();
    $instructoresModel = new InstructoresModel();

    // Obtener los datos
    $data['usuarios'] = $usuariosModel->findAll();
    $data['clases'] = $clasesModel->findAll();
    $data['especialidades'] = $especialidadesModel->findAll();
    $data['instructores'] = $instructoresModel->findAll();

    // Pasar los datos a la vista
    return view('inscripciones/nuevo', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $reglas =[
            'id_usuario' => 'required',
            'id_clase' => 'required',
            'telefono' => 'required',
            'fecha_inicio' => 'required',

        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $post = $this->request->getPost(['id_usuario', 'id_clase', 'telefono', 'fecha_inicio']);
        $InscripcionesModel = new InscripcionesModel();
        $InscripcionesModel->insert([
            'id_usuario' => $post['id_usuario'],
            'id_clase' => $post['id_clase'],
            'telefono' => $post['telefono'],
            'fecha_inicio' => $post['fecha_inicio'],
        ]);

        return redirect()->to('inscripciones');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        if ($id == null) {
            return redirect()->route('inscripciones');
        }
        
        $inscripcionesModel = new InscripcionesModel();
        $usuariosModel = new UsuariosModel();
        $clasesModel = new ClasesModel();
        $especialidadesModel = new EspecialidadesModel();
        $instructoresModel = new InstructoresModel(); 
    
        $data['inscripcion'] = $inscripcionesModel->find($id);
        $data['usuarios'] = $usuariosModel->findAll();
        $data['clases'] = $clasesModel->findAll();
        $data['especialidades'] = $especialidadesModel->findAll(); 
        $data['instructores'] = $instructoresModel->findAll(); 
        
        return view('inscripciones/editar', $data);
    }
    
    
    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
       
    $reglas = [
        'id_usuario' => 'required',
        'id_clase' => 'required',
        'telefono' => 'required',
        'fecha_inicio' => 'required',
    ];

    if (!$this->validate($reglas)) {
        return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
    }

   
    $post = $this->request->getPost(['id_usuario', 'id_clase', 'telefono', 'fecha_inicio']);

    
    $InscripcionesModel = new InscripcionesModel();

    
    if ($id === null) {
        return redirect()->to('inscripciones')->with('error', 'No se ha proporcionado un ID válido.');
    }


    $result = $InscripcionesModel->update($id, [
        'id_usuario' => $post['id_usuario'],
        'id_clase' => $post['id_clase'],
        'telefono' => $post['telefono'],
        'fecha_inicio' => $post['fecha_inicio'],
    ]);

   
    if ($result === false) {
        return redirect()->back()->withInput()->with('error', 'No se pudo actualizar el registro.');
    }

    return redirect()->to('inscripciones');
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        if ($id == null) {
            return redirect()->route('inscripciones');
        }
    
        $InscripcionesModel = new InscripcionesModel();
        $InscripcionesModel->delete($id);
    
        return redirect()->to('inscripciones');
    }
}
