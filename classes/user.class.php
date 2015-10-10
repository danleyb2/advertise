<?php
#namespace classes;


class User
{
    // TODO - Insert your code here

    /**
     */
    function __construct()
    {

        // TODO - Insert your code here
    }

    function check($name,$pass){
        global $database;
        $query="select * from users where email='$name' and password='$pass'";
        $result_set=mysqli_query($database->get_connection(), $query);
        echo 'checking: '.$query;
        if ($result_set) {
            return mysqli_fetch_assoc($result_set);
        }
    }



    /**
     */
    function __destruct()
    {

        // TODO - Insert your code here
    }
}

?>