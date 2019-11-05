<?php
namespace Core\Table;


class Table{

    protected $table;


    /**
     * Table constructor.
     * @param \Core\Database\Database $db
     */
    public function __construct(\Core\Database\Database $db){

        $this->db = $db;

        if(is_null($this->table)){
            $parts = explode('\\',get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table','',$class_name)).'s';
        }
    }

    /**
     * @return mixed
     */
    public function all(){
        return $this->query('SELECT * FROM '.$this->table);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id){
        return $this->query(
          "SELECT * FROM {$this->table}
          WHERE  id = ? ", [$id],true
        );
    }

    /**
     * @param $id
     * @param $fields
     * @return mixed
     */
    public function update($id, $fields){
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v){
           $sql_parts[] = "$k = ?";
           $attributes[] = $v;
        }
        $attributes[] = $id;

        $sql_part = implode(',', $sql_parts);


        return $this->query(
            "UPDATE {$this->table} SET $sql_part 
          WHERE  id = ? ", $attributes,true
        );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id){

        return $this->query(
            "DELETE FROM {$this->table} WHERE  id = ? ", [$id],true
        );
    }

    /**
     * @param $fields
     * @return mixed
     */
    public function create($fields){
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $sql_part = implode(',', $sql_parts);
        return $this->query(
            "INSERT INTO {$this->table} SET $sql_part ", $attributes,true
        );
    }

    /**
     * @param $key
     * @param $value
     * @return array
     */
    public function extract($key, $value){
        $record = $this->all();
        //var_dump($record);
        $return = [];
        foreach ($record as $k => $v){
            $return[$v->$key] = $v->$value;
        }


        return $return;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function allDomaineTag($id){
        return $this->query("
        SELECT domaine.id as id, domaine.libelle as libelle FROM service, domaine WHERE service.id = domaine.id_service 
        AND service.libelle = ?
        ",[$id],false);
    }


    /**
     * @param $key
     * @param $value
     * @param $id
     * @return array
     */
    public function extractByTag($key, $value,$id){
        $record = $this->allDomaineTag($id);
        $return = [];
        foreach ($record as $k => $v){
            $return[$v->$key] = $v->$value;
        }


        return $return;
    }

    /**
     * @param $statement
     * @param null $attributes
     * @param bool $one
     * @return mixed
     */
    public function query($statement, $attributes = null, $one = false){
        if($attributes){
           return $this->db->prepare($statement,$attributes,str_replace('Table','Entity',get_class($this)), $one);
        }else{
           return $this->db->query($statement,str_replace('Table','Entity',get_class($this)), $one);
        }
    }
}