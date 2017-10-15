<html>
    <head>
        <title>Demo : PHP backup and restore MySQL database</title>
    </head>
    <body style="font-family: Verdana;">
        <div>
            <h3>PHP Mysql database backup demo (Version 2)</h3>
            <ul>
                <li>Version 1 : store backup record in database. [<a href="index.php">demo</a>]</li>
                <li>Version 2 : store backup record in csv file. </li>
                <li>project on Github : <a href="https://github.com/adaydesign/php-mysql-backup">https://github.com/adaydesign/php-mysql-backup</a></li>
            </ul>
        </div>
        <!-- output -->
        <div>
            <div id="div_progress" style="background-color:#111122;color:#008833;font-size:12px;padding:10px"></div>
        </div>
        <!-- Backup -->
        <div>
            <h3>Backup database</h3>
            <p>insert comment ..</p>
            <input type="text" id="tx_comment">
            <button onclick="backup()">backup</button>
        </div>
        <hr>
        <!-- Restore -->
        <div>
            <h3>List of backup files</h3>
            <div id="div_bak_table"></div>
        </div>

        
    </body>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script>
        // backup database
        function backup(){
            $("#div_progress").html("Backup database in progress ..");

            var url_link = "lib/v2/db_backup.php";
            var values   = {"comment":$("#tx_comment").val()};
            $.ajax({
                url : url_link,
                type: "POST",
                data: values,
                success: function(response){
                    $("#div_progress").html(response);
                    //
                    backup_records();
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log(textStatus, errorThrown);
                }
            });
        }
        // show list of backup records
        function backup_records(){
            var url_link = "render/render_bak_table.php";
            var values   = {"version":2};
            $.ajax({
                url : url_link,
                type: "POST",
                data: values,
                success: function(response){
                    $("#div_bak_table").html(response);
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log(textStatus, errorThrown);
                }
            });
        }

        // restore db
        function restore(file){
            var url_link = "lib/v2/db_restore.php";
            var values   = {"bak_file":file};
            $("#div_progress").html("Restore database in progress ..");
            $.ajax({
                url: url_link,
                type: "POST",
                data: values,
                success: function(response){
                    $("#div_progress").html(response);
                    //
                    backup_records();
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log(textStatus, errorThrown);
                }
            });
        }

        // render document
        $(function(){

            // show list of backup records if we have
            backup_records();
        });

    </script>
</html>