<?php
  require_once('header.php');
  require_once('slider.php');
?>

<?php
	if(!isset($_GET['category']) || $_GET['category'] == NULL){
		header('location:404.php');
	}else{
      $cat_id = $_GET['category'];
	}
?>
<div class="contentsection contemplete clear">
<div class="maincontent clear">
            <?php
                $select ="select * from tbl_post where cat ='$cat_id' limit 3";
                $post = $db->select($select);
                if($post){
                while($results = $post->fetch_assoc()){
            ?>
			<div class="samepost clear">
		     	<h2><a href="post.php?id=<?php echo $results['id']?>"><?php echo $results['title']?></a></h2>
				 <h4><?php echo $fm->formatDate($results['date']);?> By <a href="#"><?php echo $results['author']?></a></h4>
			      <a href="#"><img src="images/post1.jpg" alt="post image"/></a>
				<p>
				   <?php echo $fm->shortenText($results['body']);?>
				</p>
				<div class="readmore clear">
				<a href="post.php?id=<?php echo $results['id']?>">Read More</a>
			  </div>
			</div>
			<?php }?><!-- while_lope end -->
    	<?php }else{ header('location:404.php'); } ?>
</div>
<?php require_once('sidebar.php');?>
<?php require_once('footer.php');?>