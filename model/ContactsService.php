<?php

require_once 'model/ContactsDAO.php';
require_once 'model/ValidationException.php';


class ContactsService {
    
    private $ContactsDAO    = NULL;
    public $mysqli = null;
    
    public static function openDb() {
        $mysqli = new mysqli("localhost", "root", "","mvc_prof");
        if (! $mysqli) {
            throw new Exception("Connection to the database server failed!");
        }

        return $mysqli;
    }
    
    private function closeDb() {
        $mysqli = ContactsService::openDb();
        $mysqli->close();
    }
  
    public function __construct() {
        $this->ContactsDAO = new ContactsDAO();
    }
    
    public function getAllContacts($order) {
        try {
            //$this->openDb();
            $res = $this->ContactsDAO->selectAll($order);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    public function getContact($id) {
        try {
            //$this->openDb();
            $res = $this->ContactsDAO->selectById($id);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
        return $this->ContactsDAO->find($id);
    }
    
    private function validateContactParams( $name, $phone, $email, $address ) {
        $errors = array();
        if ( !isset($name) || empty($name) ) {
            $errors[] = 'Name is required';
        }
        if ( empty($errors) ) {
            return;
        }
        throw new ValidationException($errors);
    }
    
    public function createNewContact( $name, $phone, $email, $address ) {
        try {
            //$this->openDb();
            //$this->validateContactParams($name, $phone, $email, $address);
            $res = $this->ContactsDAO->insert($name, $phone, $email, $address);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    public function deleteContact( $id ) {
        try {
            //$this->openDb();
            $res = $this->ContactsDAO->delete($id);
            $this->closeDb();
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    
}

?>
