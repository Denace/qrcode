<?php
    phpinfo();

  /*  $serverName = "192.168.69.85";  
            $connectionOptions = array("Database"=>"Harvestitdb",  
                "Uid"=>"harvestitadmin", "PWD"=>"hitadmin");  
            $conn = sqlsrv_connect($serverName, $connectionOptions);  
                    

  
if( $conn === false )  
{  
     echo "Could not connect.\n";  
     die( print_r( sqlsrv_errors(), true));  
}  
  
if( $client_info = sqlsrv_client_info( $conn))  
{  
       foreach( $client_info as $key => $value)  
      {  
              echo $key.": ".$value."\n";  
      }  
}  
else  
{  
       echo "Client info error.\n";  
}  
  
/* Close connection resources.   
sqlsrv_close( $conn);  */
?>