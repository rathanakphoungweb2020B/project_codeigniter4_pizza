<?php namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
	public function login()
	{
		$data = [];
		helper(['form']);

		if($this->request->getMethod() == 'post'){

			$rules = [
				'email' => 'trim|required|valid_email',
				'password' => 'required|validateUser[email,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email or Password don\'t match'
				]
			];

			if(!$this->validate($rules, $errors)){
				$data['validation'] = $this->validator; 
			}else{
				$model = new UserModel();

				$user = $model->where('email', $this->request->getVar('email'))->first();
				$this->setUserSession($user);
				return redirect()->to('index');
			}
		}

		return view('login', $data);
	}
	//--------------------------------------------------------------------


	private function setUserSession($user){

		$data = [

			'id' => $user['id'],
			'email' => $user['email'],
			'password' => $user['password'],
			'address' => $user['address'],
			'role' => $user['role'],
			
		];

		session()->set($data);
		return true;
	}
	//--------------------------------------------------------------------


	public function register()
	{
		$data = [];
		helper(['form']);

		if($this->request->getMethod() == 'post'){

			$rules = [
				'email' => 'trim|required|valid_email',
				'password' => 'required|trim',
				'address' => 'required'
			];

			if(!$this->validate($rules)){
				$data['validation'] = $this->validator; 
			}else{
				$model = new UserModel();

				$newData = [
					'email' =>$this->request->getVar('email'),
					'password' =>$this->request->getVar('password'),
					'address' =>$this->request->getVar('address'),
					'role' =>$this->request->getVar('role'),
				];

				$model->createUser($newData);
				$session = session();
				$session->setFlashdata('success', 'Successful Registration!!!');
				return redirect()->to('/');
			}
		}

		return view('register', $data);
	}

	//--------------------------------------------------------------------

	public function logout(){
		$session()->destroy();
		return redirect()->to('/');
	}
}



