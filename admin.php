<?php
require( "config.php" ); 
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
switch ( $action ) {
  case 'newArticle':
    newArticle();
    break;
  default:
    listArticles();
}
  
function newArticle() {
  $results = array();
  $results['pageTitle'] = "New Article";
  $results['formAction'] = "newArticle";
 
  if ( isset( $_POST['saveChanges'] ) ) {
 
    // User has posted the article edit form: save the new article
    $article = new Article;
    $this->__construct( $_POST  );
    $article->insert();
    header( "Location: admin.php?status=changesSaved" );
 
  } elseif ( isset( $_POST['cancel'] ) ) {
 
    // User has cancelled their edits: return to the article list
    header( "Location: admin.php" );
  } else {
 
    // User has not posted the article edit form yet: display the form
    $results['article'] = new Article;
    require( "templates/editArticle.php" );
  }
 
}

function listArticles() {

  $results = array();
  $data = Article::getArticles( );
  $results['articles'] = $data['articles'];
  $results['pageTitle'] = "All Articles";
  
  require( "templates/listArticles.php" );

}

 
?>
