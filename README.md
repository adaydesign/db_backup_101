# PHP-MySQL-backup
demo php mysql database backup script, extended from @daniloaz https://github.com/daniloaz/myphp-backup

It requires PHP 5.0.5 or later.

# Version
version 1.0 : store backup record in database.

version 2.0 : store backup record in csv file.

Usage
-------
copy files in *lib* folder to your project

**Configuaration**
: edit file *lib/db_config.php* 

    define("DB_HOST", 'localhost');             // host
    define("DB_USER", 'username');              // username
    define("DB_PASSWORD", 'password');          // password
    define("DB_NAME", 'demo_db_101');           // database name, change to your database name that you want to backup
    define("DB_REC_NAME", 'demo_db_bak_rec');   // database of backup record
    define("BACKUP_DIR", 'D:\backup-files');    // backup file destination (location)
    define("CHARSET", 'utf8');
    define("TABLES", '*');                      // Full backup
    define("GZIP_BACKUP_FILE", true);           // Set to false if you want plain SQL backup files (not gzipped)
    
**Backup**
: example for call backup function
    
    function backup(){
        var url_link = "lib/db_backup.php";
        var values   = {};
        $.ajax({
            url : url_link,
            type: "POST",
            data: values,
            success: function(response){
                // to do ..
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log(textStatus, errorThrown);
            }
        });
     }

**Restore**
: example for restore function, pass database backup file name to this function

      function restore(file){
            var url_link = "lib/db_restore.php";
            var values   = {"bak_file":file};
            $.ajax({
                url: url_link,
                type: "POST",
                data: values,
                success: function(response){
                    // to do..
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log(textStatus, errorThrown);
                }
            });
        }
    
-----
Project at GitHub: https://github.com/adaydesign/db_backup_101
