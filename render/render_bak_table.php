<?php

    $version = $_POST["version"];
    $record  = array();

    if($version == 1){
        // version 1 : query from database
        include_once "../lib/v1/db_config.php";

        // connect database
        $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_REC_NAME);
        $conn->set_charset(CHARSET);
        // check connection
        if ($conn->connect_error){
            die("DB Connection failed: ". $conn->connect_error);
        }

        // query ..
        $sql = "SELECT * FROM tb_backup_record 
                WHERE result=1 and action=0 ORDER BY id DESC";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($rs_row = $result->fetch_assoc()){
                $record[] = $rs_row;
            }
        }

        $conn->close();
    }else if($version == 2){
        // version 2 : read data from csv file
        include_once "../lib/v2/db_config.php";
        $file_addr = "../lib/v2/".DB_REC_NAME;
        if(file_exists ($file_addr)){
            $file = fopen($file_addr,'r');
           
            // bak file,gz,date,comment
            while($row = fgetcsv($file)){
                if(count($row)==4){
                    $rs = array();
                    $rs["bak_file_name"] = $row[0];
                    $rs["gz"]            = $row[1];
                    $rs["action_date"]   = $row[2];
                    $rs["comment"]       = $row[3];
    
                    $record[] = $rs;
                }
                
            }

            // reverse record
            $record = array_reverse($record);
    
            fclose($file);
        }
        
    }


    // Table ..
    echo "<table cellspacing=10>",
            "<thead>",
                "<tr>",
                    "<th>#</th>",
                    "<th>file name</th>",
                    "<th>backup date</th>",
                    "<th>comment</th>",
                    "<th></th>",
                "</tr>",
            "</thead>",
            "<body>";
    if(count($record) > 0){
        $order = 1;
        foreach($record as $rec){
            $file   = $rec["bak_file_name"];
            $gz     = $rec["gz"];
            $date   = $rec["action_date"];
            $comment= "";
            if(isset($rec["comment"]) && !empty($rec["comment"])){
                $comment = $rec["comment"];
            }
            $full_file_name = $file. ($gz ? ".gz":"");

            echo "<tr>",
                    "<td>".$order++."</td>",
                    "<td>$file</td>",
                    "<td>$date</td>",
                    "<td>$comment</td>",
                    "<td><button onclick=\"restore('$full_file_name')\">restore db</button></td>",
                 "</tr>";

        }
        
    }else{
        echo "<tr><td colspan='5'>- don't have any backup file -</td></tr>";
    }
    echo    "</body>", 
         "</table>";

    
?>