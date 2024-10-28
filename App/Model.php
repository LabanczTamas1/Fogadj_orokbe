<?php
namespace App;
use App\Database;
class Model
{
    public string $table;
    protected $primaryKey = 'id';
    protected array $attributes;
    protected static Database $DB;
    function __construct($param = null)
    {
        if ($param) $this->create($param);

        self::$DB = new Database;
    }
    public function createCollection(array $query)
    {
        $modelArray = array();

        $modelClass = get_class($this);

        $refl = new \ReflectionClass($modelClass);
        foreach ($query as $item) {
            array_push($modelArray, new $refl->name($item));

        }
        return $modelArray;
    }
    
    public function create($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    public function all()
    {
        $modelArray = array();
        $query = self::$DB->read($this->table);
        $modelArray = $this->createCollection($query);
        return $modelArray;
    }

    public function getItemById(int $id)
    {
        $result = self::$DB->readOne($this->table, $id);
        if (!isset($result["id"])){
            $result = $result[0];
        }
        return $this->create($result);
    }

    public function getItemBy(string $column, string $value)
    {
        $result = self::$DB->getItemByValue($this->table,$column,$value);
        if($result){
            return $this->create($result[0]);
        }else{
            return false;
        }
    }

    public function getItemsBy(string $column, string $value)
    {
        $query = self::$DB->getItemByValue($this->table,$column,$value);
        $collection = array();
        $collection = $this->createCollection($query);
        if($collection){
            return $collection;
        }else{
            return false;
        }
    }

    public function save()
    {
        try {
            $data = $this->attributes;
            self::$DB->insert($this->table, $data);
        } catch (\Exception $ex) {
            print_r($data);
            echo 'hiba a mentésnél: <br> ' . $ex->getMessage();
            return false;
        }
        return true;
    }
    
    public function delete(){
        try {
            
            self::$DB->delete($this->table,$this->id);
        } catch (\Exception $ex) {
            echo 'hiba a törlésnél: <br> ' . $ex->getMessage();
            return false;
        }
        return true;
    }

    public function update()
    {
        try {
            $data = $this->attributes;
            self::$DB->update($this->table, $data, $this->id);
        } catch (\Exception $ex) {
            echo 'hiba a módosításnál: <br> ' . $ex->getMessage();
            return false;
        }
        return true;
    }
    public function __get($attribute)
    {
        return $this->attributes[$attribute];
    }

    public function set($attribute, $data)
    {
        if (!$this->attributes[$attribute]) {
            array_push($this->attributes, $attribute);
        }
        $this->attributes[$attribute] = $data;
        return true;
    }
    
    public function filter(array $filters)
    {

        $query = self::$DB->filter($this->table, $filters);

        $collection = $this->createCollection($query);

        if ($collection) {
            return $collection;
        } else {
            return false;
        }
    }

    public function search(string $searchTerm, array $attributes)
    {
        $result = null;

        $query = self::$DB->read_filter($this->table, $attributes, $searchTerm);

        if ($query)
            $result = $this->createCollection($query);

        return $result;
    }
    public  function count($column,$id){
        $result = self::$DB->count($this->table,$column,$id);
        if(empty($result)){
        return false;
        }
        else{
            return $result;
        }

    }
}