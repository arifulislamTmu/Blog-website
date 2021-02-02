<?php require_once('header.php')?>
<?php require_once('sidebar.php')?>

<?php
      if(!isset($_GET['rplayid']) || $_GET['rplayid']== NULL){

        echo"<script>window.location='index.php';</script>";
      }else{
        $id = $_GET['rplayid'];
      }
     ?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $to = $fm->validation($_POST['toemail']);
    $from = $fm->validation($_POST['formemail']);
    $subject = $fm->validation($_POST['subject']);
    $sendEmail =mail($to, $from, $subject);
}?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">   
          <?php 
            $query = "SELECT * FROM tbl_contact Where id= '$id'";
            $socialmedia = $db->select($query);
            if($socialmedia){
            while($results=$socialmedia->fetch_assoc()){
         ?>
            
                 <form action="" method="POST" >
                    <table class="form">
                        <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text"name="toemail" readonly value="<?php echo $results['email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="formemail" placeholder="Enter Email" class="medium" />
                            </td>
                        </tr>
                  
                     
                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="subject"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send"/>
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