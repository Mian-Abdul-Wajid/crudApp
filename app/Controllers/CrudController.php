<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CrudModel;

class CrudController extends BaseController
{

    public function deleteUser($id = null)
    {
        // $data['title'] = "CrudApp - Delete";

        $model = new CrudModel();

        if ($id === null) {
            return redirect()->to(base_url('/'));
        } else {

            // $model->where('id', $id)->delete();
            $model->delete($id);
            $data = [
                'status' => 'Deleted Successfully',
                'status_text' => 'Data Has Been Deleted successfully',
                'status_icon' => 'success'
            ];
            return $this->response->setJSON($data);
            // return redirect()->to(base_url('/'));
        }

        // echo '<pre>';
        // print_r($del);
        // die;
    }

    public function editData($id)
    {
        $data['title'] = "CrudApp - Update Data";
        $data['favicon'] = base_url('/') . "/public/crud_favicon.ico";

        $model = new CrudModel();
        $data['row']  = $model->where('id', $id)->first();
        return view('edit_data', $data);
    }

    public function updateData()
    {

        $model = new CrudModel();

        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'mobile' => $this->request->getVar('mobile'),
            'email' => $this->request->getVar('email'),
            'address' => $this->request->getVar('address')
        ];

        $model->update($id, $data);
        return redirect()->to(base_url('/'));
    }

    public function index()
    {
        $data['title'] = "CrudApp - Home";
        $data['favicon'] = base_url('/') . "/public/crud_favicon.ico";
        
        // echo '<pre>';
        // print_r($data['favicon']);
        // die;

        $model = new CrudModel();
        $data['users'] = $model->findAll();

        return view('crud_home', $data);
    }

    public function insert()
    {
        $data['title'] = "CrudApp - Insert Record";
        $data['favicon'] = base_url('/') . "/public/crud_favicon.ico";

        if (($this->request->getmethod()) === 'post') {

            $rules = $this->validate([
                'name' => [
                    'label' => "name",
                    'rules' => "required|min_length[3]",
                    'errors' => [
                        'required' => 'Please Enter the Name.',
                        'min_length' => 'Name should contain atleast 3 characters.'
                    ]
                ],
                'mobile' => [
                    'label' => "mobile",
                    'rules' => "required"
                ],
                'email' => [
                    'label' => "email",
                    'rules' => "required"
                ],
                'address' => [
                    'label' => "address",
                    'rules' => "required"
                ],
            ]);
            if ($rules === true) {
                $data['name'] = $this->request->getPost('name');
                $data['mobile'] = $this->request->getPost('mobile');
                $data['email'] = $this->request->getPost('email');
                $data['address'] = $this->request->getPost('address');

                $model = new CrudModel();
                $model->insert($data);
                

                if ($model) {
                    return redirect()->to(base_url('/'));
                }
            } else {
                return view('insert_data', $data);
            }
            // echo '<pre>';
            // print_r($this->request->getmethod());
            // die;
        } else {
            return view('insert_data', $data);
        }
    }
}
