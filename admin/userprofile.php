<?php require_once('header.php')?>
<?php require_once('sidebar.php')?>
<?php 
  $userid = Session::get('userId');
  $userRole = Session::get('role');
?>
    <div class="grid_10">
        <?php
   if($_SERVER['REQUEST_METHOD']=='POST'){
          $name = $fm->validation($_POST['name']);
          $username = $fm->validation($_POST['username']);
          $email     = $fm->validation($_POST['email']);
          $details     = $fm->validation($_POST['details']);

          $name = mysqli_real_escape_string($db->link, $name);
          $nameuser = mysqli_real_escape_string($db->link, $username);
          $email = mysqli_real_escape_string($db->link, $email);
          $details = mysqli_real_escape_string($db->link, $details);

          if(empty($name)|| empty($username) || empty($email)|| empty($details)){
            echo "<span class='error'>Field Must not be empty !!!</span>";
          }else{
           $query = "update  tbl_user SET name='$name',username='$nameuser',email='$email',details='$details' Where id='$userid'";
           $inserted_rows = $db->update($query);
           if ($inserted_rows) {
            echo "<span class='success'>User Update Successfully.
            </span>";
           }else {
            echo "<span class='error'>User Not Update !</span>";
           }
        }
        }
   ?>
    <div class="box round first grid">
                <h2>Update User</h2>
                <div class="block">   
             <?php
                    $query = "SELECT * FROM tbl_user Where id='$userid' ";

                    $post = $db->select($query);
                    if($post){
                    while($result = $post->fetch_assoc()){
                ?>
                 <form action="" method="POST">
                    <table class="form">
                     
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" name="username" value="<?php echo $result['username'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
                
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Description</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="details" ><?php echo $result['details'];?></textarea>
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
                    <?php } } ?>
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