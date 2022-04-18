<?php

/**
 * main model
 */
class Model extends Database
{
    protected $table = "table_name;
    public $errors = array();



    public function where($column, $value)
    {

        $column = addslashes($column);
        $query = "select * from $this->table where $column = :value";
        return $this->query($query, [
            'value' => $value
        ]);
    }
    
    
    public function findAll()
    {

        $query = "select * from $this->table ";
        return $this->query($query);
    }
    
    
    public function insert($data)
    {


        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $values = implode(',:', $keys);

        $query = "insert into $this->table ($columns) values (:$values)";

        return $this->query($query, $data);
    }

    public function update($id, $data)
    {
        $str = "";
        foreach ($data as $key => $value) {
            // code...
            $str .= $key . "=:" . $key . ",";
        }

        $str = trim($str, ",");

        $data['id'] = $id;
        $query = "update $this->table set $str where employee_ID = :id";

        return $this->query($query, $data);
    }


    public function delete($id)
    {
        $query = "delete from $this->table where employee_ID= :id";
        $data['id'] = $id;
        return $this->query($query, $data);

    }
    
     public function deleteper($column,$id)
    {
        $query = "delete from $this->table where $column= :id";
        $data['id'] = $id;
        return $this->query($query,$data);
        
    }
    
    public function deletepsw($id)
    {
        $query = "delete from $this->table where pwdResetEmail= :id";
        $data['id'] = $id;
        return $this->query($query, $data);

    }

}

