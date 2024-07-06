<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClasesModel;
use App\Models\InstructoresModel;
use App\Models\EspecialidadesModel;


class Clases extends BaseController
{
    protected $helpers = ['form'];
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $ClasesModel = new ClasesModel();
        $data['clases'] = $ClasesModel->findAll();

        // Obtener los nombres de las especialidades para cada clase
        foreach ($data['clases'] as &$clase) {
            $clase['especialidad_nombre'] = $ClasesModel->obtenerEspecialidad($clase['id_instructor']);
            $clase['instructor_nombre'] = $ClasesModel->obtenerInstructor($clase['id_instructor']);
        }

        return view('clases/index', $data); 
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
        
        $InstructoresModel = new InstructoresModel();
        $EspecialidadesModel = new EspecialidadesModel(); 

        $data['instructores'] = $InstructoresModel->findAll();
        $data['especialidades'] = $EspecialidadesModel->findAll(); // Obtener todas las especialidades

        return view('clases/nuevo', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $reglas =[
            'id_instructor' => 'required|is_not_unique[especialidades.id]',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'descripcion' => 'required',

        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $post = $this->request->getPost(['id_instructor', 'fecha_inicio', 'fecha_fin', 'descripcion']);
        $ClasesModel = new ClasesModel();
        $ClasesModel->insert([
            'id_instructor' => $post['id_instructor'],
            'fecha_inicio' => $post['fecha_inicio'],
            'fecha_fin' => $post['fecha_fin'],
            'descripcion' => $post['descripcion'],
        ]);

        return redirect()->to('clases');
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
            return redirect()->route('clases');
        }
        
        $ClasesModel = new ClasesModel();
        $InstructoresModel = new InstructoresModel();
        $EspecialidadesModel = new EspecialidadesModel(); 
    
        $data['instructores'] = $InstructoresModel->findAll(); 
        $data['especialidades'] = $EspecialidadesModel->findAll();
        $data['clase'] = $ClasesModel->find($id); 
        
        return view('clases/editar', $data);
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
        if ($id == null) {
            return redirect()->to('clases');
        }
    
        $reglas =[
            'id_instructor' => 'required|is_not_unique[especialidades.id]',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'descripcion' => 'required',
        ];
    
        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }
    
        $post = $this->request->getPost(['id_instructor', 'fecha_inicio', 'fecha_fin', 'descripcion']);
        $ClasesModel = new ClasesModel();
        $ClasesModel->update($id, [
            'id_instructor' => $post['id_instructor'],
            'fecha_inicio' => $post['fecha_inicio'],
            'fecha_fin' => $post['fecha_fin'],
            'descripcion' => $post['descripcion'],
        ]);
    
        return redirect()->to('clases');
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
            return redirect()->route('clases');
        }
    
        $ClasesModel = new ClasesModel();
        $ClasesModel->delete($id);
    
        return redirect()->to('clases');
    }    
}
