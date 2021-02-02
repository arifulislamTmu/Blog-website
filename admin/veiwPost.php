<?php require_once('header.php')?>
<?php require_once('sidebar.php')?>

   <?php
      if(!isset($_GET['Viewid']) || $_GET['Viewid']== NULL){

        echo"<script>window.location='postlist.php';</script>";
      }else{
        $id = $_GET['Viewid'];
      }
     ?>
     <?php 
       if(isset($_POST['submit'])){
        echo"<script>window.location='postlist.php';</script>";  
       }
     ?>

        <div class="grid_10">
     
            <div class="box round first grid">
                <h2>View Post</h2>
                <div class="block">   
             <?php
                    $query = "SELECT * FROM tbl_post where id ='$id' order by id desc";

                    $post = $db->select($query);
                    if($post){
                    while($result = $post->fetch_assoc()){
                ?>
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                     
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" readonly value="<?php echo $result['title'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                             <select id="select" readonly name="cat">
                                <option>Select category</option>
                                <?php 
                                    $query = "SELECT * FROM tbl_category";
                                    $catename  = $db->select($query);
                                    if($catename){
                                        while($results = $catename->fetch_assoc()){
                                ?>
                                <option
                                    <?php
                                      if( $result['cat']== $results['id']){ ?>
                                        selected="selected";        
                                     <?php } ?>
                                     value="<?php echo $results['id'];?>"><?php echo $results['cat_name'];?></option>
                                <?php } }?> 
                             </select>
                            </td>
                        </tr>
                
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce"  name="body" ><?php echo $result['body'];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" readonly value="<?php echo $result['author'];?>"  class="medium" />
                             <td>
                                <input type="hidden" name="userId" value="<?php echo Session::get('userId')?>"class="medium" />
                             </td>
                               
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tag</label>
                            </td>
                            <td>
                                <input type="text" name="tag" readonly value="<?php echo $result['tag'];?>"  class="medium" />
                            </td>
                        </tr>
                    
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="OK" />
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