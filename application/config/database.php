<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/
if (!defined('DB_SERVERGD')) define('DB_SERVERGD', "192.168.100.7");
if (!defined('DB_EMPSERVER')) define('DB_EMPSERVER', "192.168.100.2");
if (!defined('DB_SERVERSM')) define('DB_SERVERSM', "192.168.100.20");

//define('DB_SERVER', "192.168.100.2");
if (!defined('DB_DBGD')) define('DB_DBGD', "CvHub");
if (!defined('DB_EMP')) define('DB_EMP', "PIMSNEW");
if (!defined('DB_DBSM')) define('DB_DBSM', "SDMSMirror");  

if (!defined('DB_CONSTRINGGD'))define('DB_CONSTRINGGD', "DRIVER={SQL Server};SERVER=".DB_SERVERGD.";DATABASE=".DB_DBGD);                          
if (!defined('DB_EMPCONSTRING')) define('DB_EMPCONSTRING', "DRIVER={SQL Server};SERVER=".DB_EMPSERVER.";DATABASE=".DB_EMP);
if (!defined('DB_CONSTRINGSM'))define('DB_CONSTRINGSM', "DRIVER={SQL Server};SERVER=".DB_SERVERSM.";DATABASE=".DB_DBSM);


$active_group = 'default';
$active_record = TRUE;
$db['default']['hostname'] = DB_CONSTRINGGD;
$db['default']['username'] = "sa";
$db['default']['password'] = "dataport";
$db['default']['database'] = DB_DBGD;
$db['default']['dbdriver'] = "odbc";
$db['default']['dbprefix'] = "";
$db['default']['pconnect'] = FALSE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = "";
$db['default']['char_set'] = "utf8";
$db['default']['dbcollat'] = "utf8_general_ci";
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = FALSE;
$db['default']['stricton'] = FALSE;

$db['emp']['hostname'] = DB_EMPCONSTRING;
$db['emp']['username'] = "sa";
$db['emp']['password'] = "dataport";
$db['emp']['database'] = DB_EMP;
$db['emp']['dbdriver'] = "odbc";
$db['emp']['dbprefix'] = "";
$db['emp']['pconnect'] = FALSE;
$db['emp']['db_debug'] = TRUE;
$db['emp']['cache_on'] = FALSE;
$db['emp']['cachedir'] = "";
$db['emp']['char_set'] = "utf8";
$db['emp']['dbcollat'] = "utf8_general_ci";
$db['emp']['swap_pre'] = '';
$db['emp']['autoinit'] = FALSE;
$db['emp']['stricton'] = FALSE;

$db['sm']['hostname'] = DB_CONSTRINGSM;
$db['sm']['username'] = "sa";
$db['sm']['password'] = "dataport";
$db['sm']['database'] = DB_DBSM;
$db['sm']['dbdriver'] = "odbc";
$db['sm']['dbprefix'] = "";
$db['sm']['pconnect'] = FALSE;
$db['sm']['db_debug'] = TRUE;
$db['sm']['cache_on'] = FALSE;
$db['sm']['cachedir'] = "";
$db['sm']['char_set'] = "utf8";
$db['sm']['dbcollat'] = "utf8_general_ci";
$db['sm']['swap_pre'] = '';
$db['sm']['autoinit'] = FALSE;
$db['sm']['stricton'] = FALSE;

/* End of file database.php */
/* Location: ./application/config/database.php */
