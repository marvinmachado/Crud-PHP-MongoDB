<?php

class PersistenceCarMongoDB {
    private $mongo;
    private $db;
    private $collection;
    
    public function __construct() {
        $this->mongo = ConnectMongoDB::getInstance();
        $this->db = $this->mongo->navcenter;
        $this->collection = $this->db->car;
    }
    
    public function insertCar($carDocument)
    {
        $this->collection->insert($carDocument);
        $this->mongo->close();
    }
    
    public function findCar($idDb)
    {
        if(is_null($idDb)){
            return $this->collection->find();
        }else{
            $idDb = new MongoId($idDb);
            return $this->collection->find(['_id' => $idDb])->toArray();
        }
    }        
}
