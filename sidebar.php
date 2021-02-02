<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
					<?php 
						$select = "select * from  tbl_category";
						$category = $db->select($select);
						if($category){
						while($results = $category->fetch_assoc()){
					  ?>
						<li><a href="posts.php?category=<?php echo $results['id'] ?> "><?php echo $results['cat_name'] ?></a></li>
						<?php } }else{ ?>
							 <li> No category Created</li>
							<?php }?>					
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
					<?php
						$select ="select * from tbl_post";
						$post = $db->select($select);
						if($post){
						while($results = $post->fetch_assoc()){
					?>
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $results['id']?>"><?php echo $results['title']?></a></h3>
						<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
						<p>
					    	<?php echo $fm->shortenText($results['body'], 120);?>
						</p>	
		          	</div>
					<?php } }else{ header('location:404.php');}?>
	
			</div>
			
        </div>
    