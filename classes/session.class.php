<?php
#require_once('/config/config.php');
class Session
{

    private $logged_in = false;
    private $link;

    function __construct()
    {
       /* session_set_save_handler(
        array(&$this, "open"),
		array(&$this, "close"),
		array(&$this, "read"),
		array(&$this, "write"),
		array(&$this, "destroy"),
		array(&$this, "gc")
      );*/
        session_start();
        $this->check_login();
    }

    function open($save_path, $session_name){
        #global $database
        #connect to the db
        $this->link=mysqli_connect(HOST,USER,PASSWORD,NAME);
        if ($this->link){
        return true;
        }

        return false;


    }


    function read($session_id){
        #global $database

        $time  = time();
        $newID = mysqli_real_escape_string($this->link, $session_id);

       $sql="SELECT session_data FROM sessions WHERE session_id = '$newID' AND expires > $time";

       $result=mysqli_query($this->link, $sql);

       if ($result && mysqli_num_rows($result)>0){

           $row=mysqli_fetch_assoc($result);
           return $row['session_data'];

       }else {
           return '';
       }


    }
    function write($session_id,$data){
        $life_time=1000;
        $time=time()+$life_time;
        $sql="REPLACE sessions(session_id,session_data,expires) VALUES('$session_id','$data','$time')";
        mysqli_query($this->link, $sql);
        return true;


    }


    // delete all records who have passed the expiration time
    function gc() {
        $sql = "DELETE FROM sessions WHERE expires < UNIX_TIMESTAMP()";
        mysqli_query($this->link, $sql);
        return true;
    }

    function destroy($session_id){
        $sql="DELETE FROM sessions WHERE id='$session_id'";

        $result=mysqli_query($this->link, $sql);
        // Clear the $_SESSION array:*/
        if ($result){
         unset($_SESSION);
         return true;
        }else {
            return false;

        }



    }

    function close(){
        #global $database
        #close db connection
        return mysqli_close($this->link);
    }

    public function is_looged_in()
    {
        return $this->logged_in;
    }
    public function login($user)
    {
        $_SESSION['user'] = $user;

        $this->logged_in = true;
    }
    public function logout()
    {
        $this->logged_in = false;
        $this->end_session();
    }
    private function check_login()
    {
        if (isset($_SESSION['user'])) {
            $this->logged_in = true;
        } else {
            $this->logged_in = false;
        }
    }
    function end_session()
    {
        session_destroy();
        //session_id()?$this->destroy(session_id()):'';
        session_unset();
    }
}
if (!isset($session)){
$session = new Session();
}
?>