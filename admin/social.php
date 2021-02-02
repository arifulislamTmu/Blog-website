<?php require_once('header.php')?>
<?php require_once('sidebar.php')?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                
        <?php
            if(isset($_POST['submit'])){
            $fb = $fm->validation($_POST['fb']);
            $tw = $fm->validation($_POST['tw']);
            $ln = $fm->validation($_POST['ln']);
            $gp = $fm->validation($_POST['gp']);

            $fb = mysqli_real_escape_string($db->link,$fb);
            $tw = mysqli_real_escape_string($db->link,$tw);
            $ln = mysqli_real_escape_string($db->link,$ln);
            $gp = mysqli_real_escape_string($db->link,$gp);

            $query = "UPDATE tbl_social SET
                       fb ='$fb',
                       tw ='$tw',
                       ln = '$ln',
                       gp = '$gp' where id='1' ";
                $social = $db->update($query);
                if($social){
                    echo "<span class='success'>Data update  Successfully.
                    </span>";
                }else{
                    echo "<span class='error'>Post Not Inserted !</span>";
                } 
            }

        ?>
            <div class="block">
         <?php 
                $query = "SELECT * FROM tbl_social";
                $socialmedia = $db->select($query);
                if($socialmedia){
                while($results=$socialmedia->fetch_assoc()){
         ?>               
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" value="<?php  echo $results['fb'];
            ?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tw"value="<?php  echo $results['tw'];
            ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln" value="<?php  echo $results['ln'];
            ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="gp" value="<?php  echo $results['gp'];
            ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
            <?php } }?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <?php require_once('footer.php')?>