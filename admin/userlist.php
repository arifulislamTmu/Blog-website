<?php require_once('header.php')?>
<?php require_once('sidebar.php')?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>User  List</h2>
         <?php
                if(isset($_GET['delcatid'])){
                    $id =$_GET['delcatid'];
                    $query="DELETE FROM `tbl_user` WHERE `tbl_user`.`id` = '$id'";
                    $result = $db->delete($query);
                    if($result){
                      echo" Successfully Delete !!";
                    }else{
                        echo"message Not deleted";
                    }
                }
              ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th> Name</th>
							<th> User Name</th>
							<th> Email</th>
							<th> Details</th>
							<th> Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
				<?php
					  $query = "select * from tbl_user order by id DESC";
					  $category = $db->select($query);
					  if($category){
						  $i = 0;
						while($results = $category->fetch_assoc()){
							$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i ;?></td>
							<td><?php echo $results['name'];?></td>
							<td><?php echo $results['username'];?></td>
							<td><?php echo $results['email'];?></td>
							<td><?php echo $results['details'];?></td>
							<td>
                            <?php 
                             if($results['role'] == '0'){
                                echo"Admin";
                             }elseif($results['role'] == '1'){
                                echo"Author";
                             }elseif($results['role'] == '2'){
                                echo"Editor";
                             }
                            ?>
                            
                            </td>
							<td><a href="viewuser.php?userid=<?php echo $results['id'];?>">View</a>
                         <?php if(Session::get('userRole')=='0'){ ?> || 
							 <a onclick = "return confirm('Are You sure to Delete !!');" href="?delcatid=<?php echo $results['id'];?>">Delete</a> </td>
                         <?php }?>
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