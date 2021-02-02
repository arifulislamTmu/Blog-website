<?php require_once('header.php')?>
<?php require_once('sidebar.php')?>
        <div class="grid_10">
            <div class="box round first grid">
			<?php
			if(isset($_GET['seenid'])){
				$seenid= $_GET['seenid'];
				$query ="UPDATE  tbl_contact SET status='1' where id='$seenid'";
				$catupdate = $db->update($query);
				if($catupdate){
				 echo "<span class='success'>Message Send  Successfull.</span></span>";
				}else{
				 echo "<span class='error'>Massege not send !!!</span>";
		  
				}
			}
   		 ?>
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					  $query ="SELECT * From tbl_contact Where status='0'";
					  $msg = $db->select($query);
					  if($msg){
						  $i=0;
                        while($results = $msg->fetch_assoc()){
							$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $results['firstname'];?> <?php echo $results['lastname']?></td>
							<td><?php echo $results['email']?></td>
							<td><?php echo $fm->shortenText($results['body'],50)?></td>
							<td><?php echo $results['date']?></td>
							<td>
							<a href="msgview.php?msgid=<?php echo $results['id']?>">View</a> ||
							<a href="msgReplay.php?rplayid=<?php echo $results['id']?>">Replay</a> ||
							<a onclick="return confirm('Are you Sure Remove The Message !!')" href="?seenid=<?php echo $results['id']?>">Seen</a> 
							</td>
						</tr>
						<?php } }?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
		<div class="grid_10">
            <div class="box round first grid">
                <h2>Seen Message</h2>
                <div class="block">        
				<table class="data display datatable" id="example">
					<thead>
				
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					  $query ="SELECT * From tbl_contact Where status='1'";
					  $msg = $db->select($query);
					  if($msg){
						  $i=0;
                        while($results = $msg->fetch_assoc()){
							$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $results['firstname'];?> <?php echo $results['lastname']?></td>
							<td><?php echo $results['email']?></td>
							<td><?php echo $fm->shortenText($results['body'],50)?></td>
							<td><?php echo $results['date']?></td>
							<td>
							<a  onclick="return confirm('Are you Sure Remove The Message !!')" href="deletrmsg.php?delid=<?php echo $results['id']?>">Delete</a>
							</td>
						</tr>
						<?php } }?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
		

<?php require_once('footer.php')?>
<script type="text/javascript">
    $(document).ready(function () {
    setupLeftMenu();
    $('.datatable').dataTable();
    setSidebarHeight();
});
</script> 