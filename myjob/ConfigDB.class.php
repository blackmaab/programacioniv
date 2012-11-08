<?php
class ConfigDB{
        var $DB_MySQL;
        var $Server_MySQL;
        var $User_MySQL;
        var $Password_MySQL;

        var $DB_MSSQL;
        var $Server_MSSQL;
        var $User_MSSQL;
        var $Password_MSSQL;
        function ConfigDB(){
                $this->DB_MySQL = "myjob";
                $this->Server_MySQL = "localhost";
                $this->User_MySQL = "root";
                $this->Password_MySQL= "";
        }
}

?>
