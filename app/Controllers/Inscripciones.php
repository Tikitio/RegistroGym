<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InscripcionesModel;
use App\Models\UsuariosModel;
use App\Models\ClasesModel;

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

       // Obtener los datos
       $data['usuarios'] = $usuariosModel->findAll();
       $data['clases'] = $clasesModel->findAll();

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
        //
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
        //
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
        //
    }
}
