 

<?php
    include_once('dataTableAccess.php');

    $err = $state = $intVal1 = $intVal2 = $rows = $param2 = "";

     

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $action = clean_input($_GET["param"]);
        if ($action == "getData") {
            $id = clean_input($_GET["param1"]);//not used only for reference

             $result = getData();
             $result1 = $result["intVal1"];
             echo $result1 ;
             $result1 =  $result1 +1 ;
             if($result1 >10){$result1 = 0;}
           $err =  updateOutput($result1);
        }
        
        
        else {
            echo "Invalid HTTP request.";
        }
    }
    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }
?>