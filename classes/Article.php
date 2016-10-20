<?php
class Article{

	public $id = null;
	public $title = null;
	public $content = null;

	public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
    if ( isset( $data['title'] ) ) $this->title = $data['title'];
    if ( isset( $data['content'] ) ) $this->content = $data['content'];
  }

  public static function getArticles( ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $stmt = $conn->query('SELECT  * FROM articles');

    $list = array();
 
    while ( $row = $stmt->fetch() ) {
      $article = new Article( $row );
      $list[] = $article;
   }
 
    $conn = null;
    return (array("articles"=>$list));
  }

  public function insert() {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO articles (title, content ) VALUES ( :title, :content )";
    $stmt = $conn->prepare ( $sql );
    $stmt->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $stmt->bindValue( ":content", $this->content, PDO::PARAM_STR );
    $stmt->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  }

}

?>