<?php require_once('header.php')?>
<?php require_once('sidebar.php')?>

        <div class="grid_10">
        <?php
           if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
             echo"<script>window.location='catlist.php';</script>";
           
           }else{
               $id = $_GET['catid'];
           }
        ?>

            <div class="box round first grid">
                <h2>Update New Category</h2>
               <div class="block copyblock"> 
      <?php
          if($_SERVER['REQUEST_METHOD']=='POST'){
              $cat_name = $_POST['cat_name'];
              $cat_name = mysqli_real_escape_string($db->link, $cat_name);
              if(empty($cat_name)){
                echo "<span class='error'>Field Must not be empty !!!</span>";
              }else{
                  $query ="UPDATE  tbl_category SET cat_name='$cat_name' WHERE id='$id'";
                   $catupdate = $db->update($query);
                   if($catupdate){
                    echo "<span class='success'>Category Updated Successfull.</span></span>";
                   }else{
                    echo "<span class='error'>Category Not Updated !!!</span>";
             
                   }
                }
            }
        ?>
         <?php
            $query = "select * from tbl_category where id = '$id' order by  id DESC";
            $cat_id = $db->select($query);
            while($result =  $cat_id->fetch_assoc()){
        ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="cat_name" value="<?php echo $result['cat_name'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
            <?php }?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    <?php require_once('footer.php')?>