<?php
/**
 * Define database parameters here for backup and restore setting
 * for version 2
 */
define("DB_HOST", 'localhost');             // host
define("DB_USER", 'username');              // username
define("DB_PASSWORD", 'password');          // password

define("DB_NAME", 'demo_db_101');           // database name, change to your database name that you want to backup
define("DB_REC_NAME", 'demo_bak_rec.csv');  // csv file for save backup history

define("BACKUP_DIR", 'D:\backup-files');    // backup file destination (location)
define("CHARSET", 'utf8');

define("TABLES", '*');                      // Full backup
define("GZIP_BACKUP_FILE", true);           // Set to false if you want plain SQL backup files (not gzipped)


?>