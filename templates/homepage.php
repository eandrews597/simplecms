<?php include "templates/include/header.php" ?>
 
      <ul id="blog-content">
 
<?php foreach ( $results['articles'] as $article ) { ?>
 
        <li>
          <h2><?php echo htmlspecialchars( $article->title )?></h2>
          <p class="article-content"><?php echo htmlspecialchars( $article->content )?></p>
        </li>
 
<?php } ?>
 
      </ul>

 
<?php include "templates/include/footer.php" ?>