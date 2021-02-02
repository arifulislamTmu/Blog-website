<?php require_once('header.php')?>
<?php require_once('sidebar.php')?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width='10%'>Sl.No.</th>
							<th width='15%'>Post Title</th>
							<th width='20%'>Description</th>
							<th width='10%'>Image</th>
							<th width='10%'>Author</th>
							<th width='10%'>Tags</th>
							<th width='15%'>Date</th>
							<th width='10%'>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
					<?php
						$query = "SELECT tbl_post.*, tbl_category.cat_name FROM tbl_post
						INNER JOIN tbl_category ON tbl_post.cat = tbl_category.id
						ORDER BY tbl_post.title DESC";
					   $select = $db->select($query);
					   if($select){
						   $i=1; 
						 while($result = $select->fetch_assoc()){
					 ?>
							<td><?php echo $i++;?></td>
							<td><?php echo $result['title'];?></td>
							<td><?php echo $fm->shortenText($result['body'],100);?></td>
							<td><?php echo $result['image'];?></td>
							<td><?php echo $result['author'];?></td>
							<td><?php echo $result['tag'];?> </td>
							<td><?php echo $result['date'];?></td>
							<td><a href="veiwPost.php?Viewid=<?php echo $result['id'];?>">View</a> 
						<?php if(Session::get('userId')== $result['userId'] || Session::get('userRole')=='0'){ ?>
							||
							<a href="Editpost.php?editid=<?php echo $result['id'];?>">Edit</a> ||
							<a onclick="return confirm('You are sure ?')"; href="deletepage.php?delid=<?php echo $result['id'];?>">Delete</a>
						<?php }?>
						</td>
						</tr>
				 <?php } } ?>
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
   
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
    <?php require_once('footer.php')?>
