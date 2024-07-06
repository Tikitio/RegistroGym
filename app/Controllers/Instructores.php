<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EspecialidadesModel;
use App\Models\InstructoresModel;

class Instructores extends BaseController
{
    protected $helpers = ['form'];
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $InstructoresModel = new InstructoresModel();
        $data['instructores'] = $InstructoresModel->instructoresEspecialidades();

        // función getSexo
        foreach ($data['instructores'] as &$instructor) {
            $instructor['sexo'] = $InstructoresModel->getSexo($instructor['sexo']);
        }

        return view('instructores/index', $data); 
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
        $EspecialidadesModel = new EspecialidadesModel();
        $data['especialidades'] = $EspecialidadesModel->findAll();

        return view('instructores/nuevo', $data); 
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $reglas =[
            'nombres' => 'required',
            'apellidos' => 'required',
            'sexo' => 'required',
            'id_especialidad' => 'required|is_not_unique[especialidades.id]',
            'telefono' => 'required',

        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $post = $this->request->getPost(['nombres', 'apellidos', 'sexo', 'id_especialidad', 'telefono']);
        $InstructoresModel = new InstructoresModel();
        $InstructoresModel->insert([
            'nombres' => $post['nombres'],
            'apellidos' => $post['apellidos'],
            'sexo' => $post['sexo'],
            'id_especialidad' => $post['id_especialidad'],
            'telefono' => $post['telefono'],
        ]);

        return redirect()->to('instructores');
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
            return redirect()->route('instructores');
        }
        
        $InstructoresModel = new InstructoresModel();
        $EspecialidadesModel = new EspecialidadesModel();
    
        $data['especialidades'] = $EspecialidadesModel->findAll(); // Carga todas las especialidades
        $data['instructor'] = $InstructoresModel->find($id); // Carga el instructor específico
        
        return view('instructores/editar', $data);
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
            return redirect()->to('instructores');
        }
    
        $reglas =[
            'nombres' => 'required',
            'apellidos' => 'required',
            'sexo' => 'required',
            'id_especialidad' => 'required|is_not_unique[especialidades.id]',
            'telefono' => 'required',
        ];
    
        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }
    
        $post = $this->request->getPost(['nombres', 'apellidos', 'sexo', 'id_especialidad', 'telefono']);
        $InstructoresModel = new InstructoresModel();
        $InstructoresModel->update($id, [
            'nombres' => $post['nombres'],
            'apellidos' => $post['apellidos'],
            'sexo' => $post['sexo'],
            'id_especialidad' => $post['id_especialidad'],
            'telefono' => $post['telefono'],
        ]);
    
        return redirect()->to('instructores');
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
            return redirect()->route('instructores');
        }
    
        $InstructoresModel = new InstructoresModel();
        $InstructoresModel->delete($id);
    
        return redirect()->to('instructores');
    }    
 }

