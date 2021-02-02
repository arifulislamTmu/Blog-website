<?php require_once('header.php')?>
<?php require_once('sidebar.php')?>

<?php
      if(!isset($_GET['pageiid']) || $_GET['pageiid']== NULL){

        echo"<script>window.location='index.php';</script>";
      }else{
        $id = $_GET['pageiid'];
      }
     ?>

        <div class="grid_10">
        <?php
         if($_SERVER['REQUEST_METHOD']=='POST'){
            $name = mysqli_real_escape_string($db->link,$_POST['name']);
            $body = mysqli_real_escape_string($db->link,$_POST['body']);
          if($name==""|| $body==""){
             echo "<span class='error'>Feild Must Not be Empty !!!
             </span>";
          }else{  $query = "UPDATE  tbl_pages SET name='$name',body='$body'";
           $update_rows = $db->update($query);
           if ($update_rows) {
            echo "<span class='success'>Page Update Successfully.
            </span>";
           }else {
            echo "<span class='error'>Page Not Update !</span>";
           }
        }
        }
   
        ?>

            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">   
        <?php 
            $query = "SELECT * FROM tbl_pages Where id= '$id'";
            $socialmedia = $db->select($query);
            if($socialmedia){
            while($results=$socialmedia->fetch_assoc()){ ?>
            
                 <form action="" method="POST" >
                    <table class="form">
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $results['name'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"><?php echo $results['body'];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                <span ><a onclick="return confirm('You Are sure Delete Page??')"style="margin-left:20px;font-size:20px;border:1px solid;" href="Delpost.php?Delpageid=<?php echo $results['id'];?>">Delete</a></span>
                            </td>
                        </tr>
                    </table>
                    </form>
              <?php  } }?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
 <?php require_once('footer.php')?>
 <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
    <script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        setSidebarHeight();
    });
</script>
<!-- /TinyMCE -->
<style type="text/css">
    #tinymce{font-size:15px !important;}
</style>