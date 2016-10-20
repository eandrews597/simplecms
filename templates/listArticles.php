<?php include "templates/include/header.php" ?>
 
  <h1>All Articles</h1>
 
    <table>
      <tr>
        <th>Article</th>
      </tr>
 
<?php foreach ( $results['articles'] as $article ) { ?>
      <tr> 
        <td>
          <?php echo $article->title?>
        </td>
    </tr>
 
<?php } ?>
 
    </table>
 
    <p><a href="admin.php?action=newArticle">Add a New Article</a></p>
 
<?php include "templates/include/footer.php" ?>