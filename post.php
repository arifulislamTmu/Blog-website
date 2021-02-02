
	<?php
	 require_once('header.php');
	?>

<?php
	if(!isset($_GET['id']) || $_GET['id']==NULL){
		header('location:404.php');
	}else{
      $id = $_GET['id'];
	}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php 
			   $select = "select * from tbl_post Where id = '$id'";
			   $post = $db->select($select);
			   if($post){
			   while($results = $post->fetch_assoc()){
		   ?>
			<div class="about">
				<h2><?php echo $results['title']?></h2>
				<h4><?php echo $fm->formatDate($results['date']);?> By <?php echo $results['author']?></h4>
				<img src="images/post2.png" alt="MyImage"/>
				
				<p><?php echo $results['body'];?></p>
				 
			   

			   	<div class="relatedpost clear">

				   <?php
				        $catid = $results['cat'];
						$queryrleted = "select * from tbl_post Where cat='$catid' order by rand() limit 6";
						$relatedpost = $db->select($queryrleted);
						if($relatedpost){ ?>
						<h2>Related articles</h2>
						<?php
						while($rresults = $relatedpost->fetch_assoc()){  
				       ?>
				      <?php echo $rresults['image'];?>

                    <?php } }else{ echo "No related Post !!!!!";} ?>
				
			     	<?php } }else{ header('location:404.php');}?>
				</div>
			 </div>

		</div>

	<?php require_once('sidebar.php');?>		
	</div>
	<?php
     	require_once('footer.php');
	?>