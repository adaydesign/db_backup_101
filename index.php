<html>
    <head>
        <title>Demo : PHP backup and restore MySQL database</title>
    </head>
    <body>
        <!-- Backup -->
        <div>
            <h3>Backup database</h3>
            <button onclick="backup()">backup</button>
            <div id="div_backup_progress"></div>
        </div>
        <hr>
        <!-- Restore -->
        <div>
            <h3>List of backup files</h3>
            <div id="div_restore_progress"></div>
            <div id="div_bak_table"></div>
        </div>
    </body>

    <script src="js/jquery.min.js"></script>
    <script>
        // backup database
        function backup(){
            $("#div_backup_progress").html("Backup database in progress ..");

            var url_link = "lib/db_backup.php";
            var values   = {};
            $.ajax({
                url : url_link,
                type: "POST",
                data: values,
                success: function(response){
                    $("#div_backup_progress").html(response);
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
            var values   = "{}";
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
            var url_link = "lib/db_restore.php";
            var values   = {"bak_file":file};
            $("#div_restore_progress").html("Restore database in progress ..");
            $.ajax({
                url: url_link,
                type: "POST",
                data: values,
                success: function(response){
                    $("#div_restore_progress").html(response);
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