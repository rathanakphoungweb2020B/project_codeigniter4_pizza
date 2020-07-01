<?php namespace App\Models;

use CodeIgniter\Model;

class PizzaModel extends Model
{
    protected $table      = 'pizza';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['pizza', 'ingredient', 'prize'];


    public function createPizza($pizzaInfo){
        
        $this->insert([
            'pizza' => $pizzaInfo['pizza'],
            'ingredient' => $pizzaInfo['ingredient'],
            'prize' => $pizzaInfo['prize'],
        ]);
    }
    
}


