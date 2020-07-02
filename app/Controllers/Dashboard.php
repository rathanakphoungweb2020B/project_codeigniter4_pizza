<?php namespace App\Controllers;

use App\Models\PizzaModel;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [];
		helper(['form']);
		
		$pizza = new PizzaModel();
		$data['pizzas'] = $pizza->findAll();

		return view('index', $data);
	}

	//--------------------------------------------------------------------

	public function create(){

		$data = [];
		helper(['form']);

		if($this->request->getMethod() == 'post'){

			$rule = [
				'pizza' => 'required|alpha_space',
				'ingredient' => 'required',
				'prize' => 'required|min_length[1]|max_length[50]|numeric'
			];

			if(!$this->validate($rule)){
				$data['validation'] = $this->validator; 
			}else{

				$pizza = new PizzaModel();

				$newPizza = [
					'pizza' =>$this->request->getVar('pizza'),
					'ingredient' =>$this->request->getVar('ingredient'),
					'prize' =>$this->request->getVar('prize'),
				];

				$pizza->createPizza($newPizza);
				$session = session();
				$session->setFlashdata('success', 'Successful Insert Pizza!!!');
				return redirect()->to('/index');

			}

		}

		return view('index', $data);
	}

	//--------------------------------------------------------------------

	public function delete($id){
		
		$pizza = new PizzaModel();
		$pizza->delete($id);
		return redirect()->to('/index');
	}

	//--------------------------------------------------------------------

	public function update()
	{
		helper(['form']);
		$data = [];

		if($this->request->getMethod() == 'post'){

			$rules = [
				'pizza' => 'required|alpha_space',
				'ingredient' => 'required',
				'prize' => 'required|min_length[1]|max_length[50]|numeric'
			];

			if(!$this->validate($rules)){
				$data['validation'] = $this->validator; 
			}else{
				$pizza = new PizzaModel();
				$id = $this->request->getVar('id');
				$newData = [
					'name' =>$this->request->getVar('name'),
					'ingredient' =>$this->request->getVar('ingredient'),
					'prize' =>$this->request->getVar('prize'),
				];

				$pizza->update($id,$newData);
				return redirect()->to('/index');
			}
		}

		return view('index', $data);
	}
	
	public function edit($id)
    {
        $pizza = new PizzaModel();
        $data['edit']= $pizza->find($id);
        return view('index', $data);
    }

}






