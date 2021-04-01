  
<?php 

include_once "../conection/ConnectFactory.php";

abstract class Dao{


    public function __construct()
    {
        $this->con = ConnectFactory :: getConection();
    }


   


    }



?>