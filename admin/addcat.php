<?php require_once('header.php')?>
<?php require_once('sidebar.php')?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
      <?php
          if($_SERVER['REQUEST_METHOD']=='POST'){
              $cat_name = $_POST['cat_name'];
              $cat_name = mysqli_real_escape_string($db->link, $cat_name);
              if(empty($cat_name)){
                echo "<span class='error'>Field Must not be empty !!!</span>";
              }else{
                  $query ="insert into tbl_category (cat_name) values('$cat_name')";
                   $catinsert = $db->insert($query);
                   if($catinsert){
                    echo "<span class='success'>Category Insert Successfull.</span>";
                   }else{
                    echo "<span class='error'>Category Not Inserted !!!</span>";
             
                   }
                }
            }
        ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="cat_name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    <?php require_once('footer.php')?>