<html>
<head>
    <title>CHAI TRADING CO. LTD</title>
    <style>
        body {
            width: 550px;
            font-family: Arial;
        }

        #frm-qr {
            padding: 20px 40px;
            background: #CCC;
            border-radius: 3px;
        }

        .input-field {
            padding: 10px;
            border: 0px;
            border-radius: 3px;
            width: 250px;
        }

        .submit-button {
            background: #333;
            color: #FFF;
            padding: 10px 20px;
            border-radius: 3px;
        }

        .form-row {
            margin-bottom: 15px;
        }

        .result-heading {
            padding: 10px 0px 2px 0px;
            border-bottom: #333 1px solid;
            margin-bottom: 20px;
        }

        #validation-info {
            display: none;
            padding: 10px 20px;
            background: #f5c7c8;
            border: #e6bbbd 1px solid;
        }

        .qrlist{
            padding: 10px 0px 2px 0px;
            width: 500px;
        }
        ul {
            list-style-type: none;
            border: 4px dotted green;
        }
        li span{
            align: left;
            font-size: 2em;

        }
        .qr{
            float:right;

        }
            .state-icon {
            left: -5px;
        }
        .list-group-item-primary {
            color: rgb(255, 255, 255);
            background-color: rgb(66, 139, 202);
        }

        /* DEMO ONLY - REMOVES UNWANTED MARGIN 
            .well .list-group {
            margin-bottom: 0px;
        }*/

    </style>
    <link rel="stylesheet" href="/qrcode1/print.min.css">
     <link rel="stylesheet" href="/qrcode1/bootstrap.min.css">
     <link rel="stylesheet" type = "text/css" media = "print" href="/qrcode1/qr.css">
     <script src="/qrcode1/jquery-3.2.1.min.js"></script>
     <script src="/qrcode1/popper.min.js"></script>
     <script src="/qrcode1/bootstrap.min.js"></script>
     <script src="/qrcode1/print.min.js"></script>
     <script src="/qrcode1/printThis.js"></script>
    <!--<script src="bundle.js"></script>-->
</head>
<body>
    <form method="post" name="frmQRGenerator" id="frm-qr"
        action="index.php">
        <div class="form-row">
            Outward Tally Number: <input type="text" name="email_field"
                id="email_field" class="input-field" />
        </div>

        <div>
         <!--<button class="btn btn-primary col-xs-12" id="get-checked-data">Get Checked Data</button>-->

        <input type="submit" name="generate" class="submit-button"value="Generate QR Code" />           
        </div>
    </form>  
    <button class="btn btn-primary col-xs-12" id="get-checked-data">Get Checked Data</button>
    
    <div id="validation-info"></div>
    <div id="qrdata"class="container" style="margin-top:20px;">
    
    
    </div>
  
    
    <script>
        function validate() {
            var valid = true;
            var emailRegexp = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i
                
            $("#validation-info").hide();
            $("#validation-info").html();
            if($("#email_field").val() == "") {
                    $("#validation-info").show();
                    $("#validation-info").html("Email is required.");
                    valid = false;
            } else if ( !( emailRegexp.test( $("#email_field").val() ) ) ) {
                $("#validation-info").show();
                $("#validation-info").html("Invalid Email.");
                valid = false;
            }
            return valid;
        }
        function disp(){

        }
    </script>

<?php
 /*Open and retun a connection to sqlserver DB*/
   include'./lot.php';
   function OpenConnection()  
    {  
        try  
        {  
            $serverName = "testsrvr";  
            $connectionOptions = array("Database"=>"Harvestitdb",  
                "Uid"=>"harvestitadmin", "PWD"=>"hitadmin");  
            $conn = sqlsrv_connect($serverName, $connectionOptions);  
            if($conn == false) { 
                //echo ("not opening connection");
                die(FormatErrors(sqlsrv_errors()));  
            }else 
                return $conn;
                //echo ("DB conn open").$conn;
        }  
        catch(Exception $e)  
        {  
            echo("Error! could not connect to DB");  
        }  
    }  
/*
    Modify to return result set only
    create new function to handle returned result set i.e. push data to client side
*/
    function ReadData()  
    {  
        try  
        {  
            //echo("we are reading");
            //require('mssqlconnection.php');
            $conn = OpenConnection();  
            //echo("we are reading too");
            //$tsql = "exec sp_RFIDTAG ".$_POST["email_field"];  
           $tsql="SELECT hs.SupplierName AS Supplier,oth.OutwardTallyNo AS OT,td.GardenInvoiceNo AS Invoice --,oth.TransactionDate,hg.GardenName,otd.NoOfPkgs,otd.ExpectedNetWeight NetWeight  
			        from whOutwardTallyHdr oth  
                        inner join hsupplier hs on hs.SupplierCode=oth.SupplierCode  
                        inner join whOutwardTallyDtl otd on otd.SerialNo=oth.SerialNo  
                        inner join whTeaDetails td on td.SerialNo=otd.GISerialNo  
                        inner join hGarden hg on hg.gardenCode=td.GardenCode  
                    where OutwardTallyNo=".$_POST["email_field"];

            $getProducts = sqlsrv_query($conn, $tsql);  
            if ($getProducts == FALSE)  
                die(FormatErrors(sqlsrv_errors()));  
           // $productCount = 0;  
            
               // $row = new lot (sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC));
             /*
                while($row = sqlsrv_fetch_object($getProducts,"lot")) 
                    {
                        ?>
                        <script>
                        var x=<? echo json_encode($row->Supplier,$row->OT,$row->Invoice)?>;
                        alert (x);
                        </script>
                        <?                
                      //echo $row->Supplier;
                      // echo $row->OT;
                      // echo $row->Invoice;
                    //echo($row['Supplier'].",".$row['OT'].",".$row['Invoice']);//.",".$row['GardenName'].",".$row['NoOfPkgs'].",".$row['NetWeight']);  
                       //echo printQr($row->Supplier."".$row->OT."".$row->Invoice);
                        //$x=printQr($row->Supplier."".$row->OT."".$row->Invoice);
                                          
                        
                            echo printQr($row->Supplier."".$row->OT."".$row->Invoice); 
                       
                         
                        echo("<br/>"); 
                       $i++;
                        //$productCount++;  
                }
            */    
            $i=0;     
            while( $row =(sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC)))  
            {   
                //echo($row['Supplier'].",".$row['OT'].",".$row['Invoice']);
                 
                //var_dump($row) ;
                ?>
            <script>
               var x=<?php echo json_encode($row);?>;
                
                $("#qrdata").addClass("qrlist");                
                $(x).each(function(){                   
                    var y=<?php echo json_encode(printQr($row['Supplier'].",".$row['OT'].",".$row['Invoice'],$i));?>;
                        $("#qrdata").append($("<ul class='list-group checked-list-box list-group-item'></ul>")
                                            .append("<li>"+"<span>"+'CLIENT:'+"</span>"+x.Supplier+"</li>")
                                            .append("<li>"+"<span>"+'OT_NUMBER:'+"</span>"+x.OT+"</li>")
                                            .append("<li>"+"<span>"+'INVOICE:'+"</span>"+x.Invoice+"</li>")
                                            .append("<img src=/qrcode1/qr-code/<?php echo $i ;?>.png>")
                                            //.append("<li>"+y+"</li>")

                                        );
                        $("#qrdata ul").attr('id',function(index){
                            return 'card'+index;
                        });
                        
                });
               

            </script><? 
                $i++; 
            }
            sqlsrv_free_stmt($getProducts);   
            sqlsrv_close($conn); 
        }  
        catch(Exception $e)  
        {  
            echo("Error!".$e);  
        }  
    }

     /*Print the QR code as an HTML DIV based on Sting input*/

    function printQr(string $k,int $i)
    { 
            require ('../tc-lib-barcode/vendor/autoload.php');
            $barcode = new \Com\Tecnick\Barcode\Barcode();
            $targetPath = "qr-code/";
            
            if (! is_dir($targetPath)) {
                mkdir($targetPath, 0777, true);
            }
            
            $bobj = $barcode->getBarcodeObj('QRCODE,H', $k, - 2, - 2, 'black', array(
                - 2,
                - 2,
                - 2,
                - 2
            ))->setBackgroundColor('#f0f0f0'); 
            $imageData=$bobj->getPngData(); 
            $divdata=$bobj->getHtmlDiv();          
            $timestamp = time();
            file_put_contents($targetPath . $i . '.png', $imageData);
            //return $divdata;
            /*
            ?>
            <div class="result-heading">Output:</div>
            <img src="<?php echo $targetPath . $timestamp ; ?>.png" width="150px"
                height="150px">     
        */        
    }

    /*Print the QR code as an HTML DIV based on Sting input*/
/*
    function printQr(string $k)
    { 
            require ('../tc-lib-barcode/vendor/autoload.php');
            $barcode = new \Com\Tecnick\Barcode\Barcode();
            $targetPath = "qr-code/";
            
            if (! is_dir($targetPath)) {
                mkdir($targetPath, 0777, true);
            }
            
            $bobj = $barcode->getBarcodeObj('QRCODE,H', $k, - 2, - 2, 'black', array(
                - 2,
                - 2,
                - 2,
                - 2
            ))->setBackgroundColor('#f0f0f0'); 
           return  $bobj->getHtmlDiv();

            //$imagedata=$bobj->getPngData();           
            //$timestamp = time();
            //file_put_contents($targetPath . $k . '.png', $imageData);
            /*
            ?>
            <div class="result-heading">Output:</div>
            <img src="<?php echo $targetPath . $timestamp ; ?>.png" width="150px"
                height="150px">     
              
    }*/

    if(isset($_POST["email_field"]))
        ReadData();

?>

<script>
 $(function () {
     $(".list-group, .list-group-item, .checked-list-box").each(function () {
        // Settings
        var $widget = $(this),
            $checkbox = $('<input type="checkbox" hidden />'),
            color = ($widget.data('color') ? $widget.data('color') : "black"),
            style = ($widget.data('style') == "button" ? "btn-" : "list-group-item-"),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };
            
        $widget.css('cursor', 'pointer')
        $widget.append($checkbox);

        // Event Handlers
        $widget.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });
          

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $widget.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $widget.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$widget.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $widget.addClass(style + color + ' active');
            } else {
                $widget.removeClass(style + color + ' active');
            }
        }

        // Initialization
        function init() {
            
            if ($widget.data('checked') == true) {
                $checkbox.prop('checked', !$checkbox.is(':checked'));
            }
            
            updateDisplay();

            // Inject the icon if applicable
            if ($widget.find('.state-icon').length == 0) {
                $widget.prepend('<span class="state-icon ' + settings[$widget.data('state')].icon + '"></span>');
            }
        }
        init();
    });
    
    $('#get-checked-data').on('click', function(event) {
        event.preventDefault(); 
        var checkedItems = {}, counter = 0;
        $(".active").each(function(idx, li) {
            checkedItems[counter] =li.innerText;      
            counter++;
        });
        $(".active").printThis({debug:true,importCSS: false});
        //$('#display-json').html(JSON.stringify(checkedItems, null, '\t'));
    });
});

</script>
</body>
</html>