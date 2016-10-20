<?php
//To display error messages on browser
ini_set("display_errors", true);
//CMS database address
define( "DB_DSN", "mysql:host=localhost;dbname=simple_cms" );
//MySQL Login credentials
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "root" );

require("classes/Article.php");

function handleException( $exception ) {
  echo "Unexpected error! Please try again.";
  echo $exception->getMessage();
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );

?>