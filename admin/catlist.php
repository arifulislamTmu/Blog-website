<?php require_once('header.php')?>
<?php require_once('sidebar.php')?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
				<?php
					  $query = "select * from tbl_category order by id DESC";
					  $category = $db->select($query);
					  if($category){
						  $i = 0;
						while($results = $category->fetch_assoc()){
							$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i ;?></td>
							<td><?php echo $results['cat_name'];?></td>
							<td><a href="catedit.php?catid=<?php echo $results['id'];?>">Edit</a> || 
							<a onclick = "return confirm('Are You sure to Delete !!');" href="cat_del.php?delcatid=<?php echo $results['id'];?>">Delete</a> </td>
						</tr>
					<?php } }?>

					</tbody>
				</table>
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
<?php require_once('footer.php')?>

<script type="text/javascript">

$(document).ready(function () {
    setupLeftMenu();

    $('.datatable').dataTable();
    setSidebarHeight();


});
</script>