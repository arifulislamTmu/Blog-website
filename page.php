
	<?php
	 require_once('header.php');
	?>
	<?php
      if(!isset($_GET['pageiid']) || $_GET['pageiid']== NULL){
        header('location:404.php');
      }else{
        $id = $_GET['pageiid'];
      }
     ?>
	    <?php 
            $query = "SELECT * FROM tbl_pages Where id= '$id'";
            $socialmedia = $db->select($query);
            if($socialmedia){
            while($results=$socialmedia->fetch_assoc()){ ?>
            
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $results['name'];?></h2>
			    	<?php echo $results['body'];?>
				</div>
			</div>
			<?php } }?>
	<?php
	require_once('sidebar.php');
	?>
	<?php
	 require_once('footer.php');
	?>