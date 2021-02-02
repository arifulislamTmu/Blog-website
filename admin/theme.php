<?php require_once('header.php')?>
<?php require_once('sidebar.php')?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Theme</h2>
               <div class="block copyblock"> 
      <?php
          if($_SERVER['REQUEST_METHOD']=='POST'){
              $theme = $_POST['theme'];
              $theme = mysqli_real_escape_string($db->link, $theme);

              $query ="UPDATE tbl_theme SET theme='$theme' where id='1'";
              $selectTheme = $db->update($query);
              if($selectTheme ){
                echo "<span class='success'>Theme Change  Successfully.</span>";
              }else{
                echo "<span class='error'>Theme Not Change </span>";
              }
            }
        ?>

        
        <?php
           $query = "SELECT * FROM tbl_theme where id='1'";
           $selectq = $db->select($query);
           while($results = $selectq->fetch_assoc()){ ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input  <?php if($results['theme']=='defoult'){ echo "checked";}?>  type="radio" name="theme" value="defoult"/>Default
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input <?php if($results['theme']=='green'){ echo "checked";}?> type="radio" name="theme" value="green"/>Green
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input <?php if($results['theme']=='red'){ echo "checked";}?> type="radio" name="theme" value="red"/>Red
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Change" />
                            </td>
                        </tr>
                    </table>
                    </form>
           <?php } ?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    <?php require_once('footer.php')?>