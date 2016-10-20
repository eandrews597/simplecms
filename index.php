<?php

require( "config.php" );
//$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
homepage();

function homepage() {
  $results = array();
  $data = Article::getArticles( );
  $results['articles'] = $data['articles'];
  require( "templates/homepage.php" );
}
 
?>

