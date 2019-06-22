 <?php
   function OpenConnection()  
    {  
        try  
        {  
            $serverName = "tcp:m192.168.69.85,1433";  
            $connectionOptions = array("Database"=>"Harsvetitdb",  
                "Uid"=>"harvestitadmin", "PWD"=>"hitadmin");  
            $conn = sqlsrv_connect($serverName, $connectionOptions);  
            if($conn == false) { 
                echo ("not opening connection");
                die(FormatErrors(sqlsrv_errors()));  

            }
        }  
        catch(Exception $e)  
        {  
            echo("Error! could not connect to DB");  
        }  
    }  
    ?>