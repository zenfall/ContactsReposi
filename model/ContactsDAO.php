<?php

/**
 * Table data gateway.
 * 
 *  OK I'm using old MySQL driver, so kill me ...
 *  This will do for simple apps but for serious apps you should use PDO.
 */
class ContactsDAO {


    
    public function selectAll($order) {

        if(isset($order)){
            $orderDb = $order;
        }else{
            $orderDb = "name";
        }
        $mysqli = ContactsService::openDb();

        try{
        //$dbres = mysqli_query($mysqli,"SELECT * FROM contacts");
        $result = $mysqli->query("SELECT * FROM contacts order by $orderDb ");
        }catch (Exception $e){
            echo $e->getMessage();
        }
        $contacts = array();

        if(!$result){
            //throw new Exception("Une erreur a la base de donnee a ete detecter");
        }else{
            $contacts = array();
            while ( ($obj = mysqli_fetch_object($result)) != NULL ) {
                $contacts[] = $obj;
            }
        }
        
        return $contacts;
    }
    
    public function selectById($id) {

        $dbres = mysqli_query( ContactsService::openDb(),"SELECT * FROM contacts WHERE id=$id");
        
        return mysqli_fetch_object($dbres);
		
    }
    
    public function insert( $name, $phone, $email, $address ) {
        $query =  "INSERT INTO contacts (`name`, `phone`, `email`,`address`) VALUES ('$name', '$phone', '$email','$address')";
        $result= mysqli_query(ContactsService::openDb(),$query);
     //   return mysqli_insert_id(ContactsService::openDb());
        var_dump($query);
        var_dump($result);
    }
    
    public function delete($id) {
        mysqli_query(ContactsService::openDb(),"DELETE FROM contacts WHERE id=$id");
    }
    
}

?>
