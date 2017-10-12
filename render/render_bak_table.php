<?php

    include_once "../lib/db_config.php";

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
    echo "<table>",
            "<thead>",
                "<tr>",
                    "<th>ลำดับ</th>",
                    "<th>ไฟล์</th>",
                    "<th>วันที่</th>",
                    "<th>รีสโตร์</th>",
                "</tr>",
            "</thead>",
            "<body>";
    if($result->num_rows > 0){
        $order = 1;
        while($rs_row = $result->fetch_assoc()){
            $id     = $rs_row['id'];
            $file   = $rs_row['bak_file_name'];
            $gz     = $rs_row['gz'];
            $date   = $rs_row['action_date'];
            $full_file_name = $file. ($gz ? ".gz":"");

            echo "<tr>",
                    "<td>".$order++."</td>",
                    "<td>$file</td>",
                    "<td>$date</td>",
                    "<td><button onclick=\"restore('$full_file_name')\">restore db</button></td>",
                 "</tr>";

        }
        
    }else{
        echo "<tr><td colspan='4'>- ไม่พบไฟล์สำรองฐานข้อมูล -</td></tr>";
    }
    echo    "</body>", 
         "</table>";

    $conn->close();
?>