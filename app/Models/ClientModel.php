<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{ protected $table = 'client';
    /*
    public function getProduct($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['id' => $id]);
        }   
    }

  

    public function updateProduct($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }

    public function deleteProduct($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    } 
    */
    public function saveClient($data)
    {
        $query = $this->db->table($this->table)->insert($data);
      ///  return $query;
      return $this->insertID();
    }
    public function getClientByNationalityNumber($nationalityNumber)
    {
        return $this->where('nationality_number', $nationalityNumber)->first();
    }

}
