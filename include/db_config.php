<?php
/**
 * Define database parameters here for backup and restore setting
 */
define("DB_USER", 'root');
define("DB_PASSWORD", 'root');
define("DB_NAME", 'demo_db_101');           // test database
define("DB_REC_NAME", 'demo_db_bak_rec');   // database of backup record
define("DB_HOST", 'localhost');
define("BACKUP_DIR", 'D:\backup-files');
define("CHARSET", 'utf8');

define("TABLES", '*'); // Full backup
//define("TABLES", 'table1 table2 table3'); // Partial backup
define("GZIP_BACKUP_FILE", true);  // Set to false if you want plain SQL backup files (not gzipped)


?>