<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the "Database Connection"
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
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the "default" group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = "default"; //conexion activa
$active_record = TRUE;

$db['default']['hostname'] = "localhost";
$db['default']['username'] = "root";
$db['default']['password'] = "";
$db['default']['database'] = "plataforma";
$db['default']['dbdriver'] = "mysql";
$db['default']['dbprefix'] = "";
$db['default']['pconnect'] = FALSE;# Antes TRUE - Recomendado para poder trabajar con ambas conexiones en paralelo
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = "";
$db['default']['char_set'] = "latin1";
$db['default']['dbcollat'] = "latin1_swedish_ci";
$db['default']['swap_pre'] = "";
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


/*SEGUNDA CONEXION - BASE DE DATOS SISCOR*/
$db['siscor']['hostname'] = "localhost";
$db['siscor']['username'] = "root";
$db['siscor']['password'] = "";
$db['siscor']['database'] = "dbsiscor2016";
$db['siscor']['dbdriver'] = "mysql";
$db['siscor']['dbprefix'] = "";
$db['siscor']['pconnect'] = FALSE; # Recomendado para poder trabajar con ambas conexiones en paralelo
$db['siscor']['db_debug'] = TRUE;
$db['siscor']['cache_on'] = FALSE;
$db['siscor']['cachedir'] = "";
$db['siscor']['char_set'] = "latin1";
$db['siscor']['dbcollat'] = "latin1_swedish_ci";
$db['siscor']['swap_pre'] = "";
$db['siscor']['autoinit'] = FALSE; # A partir de la segunda conexión, es recomendable dejar en FALSE este valor.
$db['siscor']['stricton'] = FALSE;





/* End of file database.php */
/* Location: ./system/application/config/database.php */
