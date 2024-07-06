<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $UsuariosModel = new UsuariosModel();
        $data['usuarios'] = $UsuariosModel->findAll();

        // función getSexo
        foreach ($data['usuarios'] as &$usuario) {
            $usuario['sexo'] = $UsuariosModel->getSexo($usuario['sexo']);
        }

        return view('usuarios/index', $data);
    }

    public function new()
    {
        return view('usuarios/nuevo');
    }

    public function create()
    {
        $reglas = [
            'nombres' => 'required',
            'apellidos' => 'required',
            'sexo' => 'required',
            'telefono' => 'required',
        ];
        
        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }        

        $post = $this->request->getPost(['nombres', 'apellidos', 'sexo', 'telefono']);
        log_message('info', 'Datos a insertar: ' . print_r($post, true));
        
        $UsuariosModel = new UsuariosModel();
        $UsuariosModel->insert([
            'nombres' => $post['nombres'],
            'apellidos' => $post['apellidos'],
            'sexo' => $post['sexo'],
            'telefono' => $post['telefono'],
        ]);
        

        return redirect()->to('usuarios');
    }

    public function edit($id = null)
    {
        if ($id == null) {
            return redirect()->route('usuarios');
        }
    
        $UsuariosModel = new UsuariosModel();
        $data['usuario'] = $UsuariosModel->find($id);
    
        return view('usuarios/editar', $data);
    }

    public function update($id = null)
    {
        if (!$this->request->is('put') || $id == null) {
            return redirect()->route('usuarios');
        }

        $reglas = [
            'nombres' => 'required',
            'apellidos' => 'required',
            'sexo' => 'required',
            'telefono' => 'required',
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $post = $this->request->getPost(['nombres', 'apellidos', 'sexo', 'telefono']);
        $UsuariosModel = new UsuariosModel();
        $UsuariosModel->update($id, [
            'nombres' => $post['nombres'],
            'apellidos' => $post['apellidos'],
            'sexo' => $post['sexo'],
            'telefono' => $post['telefono'],
        ]);

        return redirect()->to('usuarios');
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
            return redirect()->route('usuarios');
        }
    
        $UsuariosModel = new UsuariosModel();
        $UsuariosModel->delete($id);
    
        return redirect()->to('usuarios');
    }    
}

