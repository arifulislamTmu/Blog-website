
<?php
  require_once('config/config.php');
  require_once('lib/Database.php');
  require_once('helpers/Format.php');
?>

<?php
	   $db = new Database(); 
	   $fm = new Format();
   ?>
<!DOCTYPE html>
<html>
<head>
	<?php
      if(isset($_GET['pageiid'])){
		$id = $_GET['pageiid'];
		$query = "SELECT * FROM tbl_pages Where id= '$id'";
		$socialmedia = $db->select($query);
		if($socialmedia){
		while($results=$socialmedia->fetch_assoc()){ ?>
		<title><?php echo TITLE;?>-<?php echo $results['name'];?></title>
		<?php } } }else{?>
			<title><?php echo TITLE;?>-<?php echo "Home"?></title>
	<?php } ?>
  
	<?php require_once('meta.php')?>
  <?php require_once('css.php')?>
  <?php require_once('scriptlang.php')?>
	
</head>

<body>
	<div class="headersection templete clear">
		<a href="#">
			<div class="logo">
				<img src="images/logo.png" alt="Logo"/>
				<h2>Website Title</h2>
				<p>Our website description</p>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
			<?php 
                $query = "SELECT * FROM tbl_social";
                $socialmedia = $db->select($query);
                if($socialmedia){
                while($results=$socialmedia->fetch_assoc()){
         ?>
				<a href="<?php echo $results['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $results['tw'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $results['ln'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $results['gp'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
		<?php } } ?>
			</div>
			<div class="searchbtn clear">
			<form action="" method="post">
				<input type="text" name="keyword" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
   <?php
	 $path = $_SERVER['SCRIPT_FILENAME'];
	 $cpage = basename($path, '.php');  
   ?>
	<ul>
		<li><a 
		<?php if($cpage =='index'){ echo"id='active'";}?>
		 href="index.php">Home</a></li>
		<?php 
			$query = "SELECT * FROM tbl_pages";
			$socialmedia = $db->select($query);
			if($socialmedia){
			while($results=$socialmedia->fetch_assoc()){ ?>
			<li><a
			<?php
			if(isset($_GET['pageiid']) && $_GET['pageiid']==$results['id']){
				echo "id='active'";
			}  
			?>
			 href="page.php?pageiid=<?php echo $results['id'];?>"><?php echo $results['name'];?></a></li>
		<?php  } }?>	

		<li><a <?php if($cpage =='contact'){ echo"id='active'";}?> href="contact.php">Contact</a></li>
	</ul>
</div>
