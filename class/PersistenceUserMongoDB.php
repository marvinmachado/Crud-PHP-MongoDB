<?php


class PersistenceUserMongoDB 
{
    private $mongo;
    private $db;
    private $collection;
    
    function __construct() {
        $this->mongo = ConnectMongoDB::getInstance();
        $this->db = $this->mongo->navcenter;
        $this->collection = $this->db->user;
    }

    public function insertUser($userDocument)
    {   
        $this->collection->insert($userDocument);
        $this->mongo->close();          
    }
    
    public function findUser($idDb = null)
    {
        if(is_null($idDb)){
            return $this->collection->find();
        }else{
            $idDb = new MongoId($idDb);
            return $this->collection->find(['_id' => $idDb])->toArray();
        }
    } 
    
    public function deleteUser($idDb)
    {
        $this->collection->remove(['_id' => new MongoId($idDb)]);
        $this->mongo->close();
    } 
    
    public function updateUser($user)
    {
        $idDb = new MongoId($user['idDb']);
        $this->collection->update(['_id' => $idDb], 
                                  ['$set' => 
                                            ['nome'=>$user['nome'], 
                                            'endereco'=>$user['endereco'],
                                            'sexo'=>$user['sexo']]]);
        $this->mongo->close();
    } 
    
    public function countUser()
    {
        return $this->collection->count();
    }        
}
