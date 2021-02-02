<?php require_once('header.php')?>
<?php require_once('sidebar.php')?>

        <div class="grid_10">
        <?php
          if(isset($_POST['submit'])){
           $title =$_POST['title'];
            $cat =$_POST['cat'];
            $body =$_POST['body'];
            $author =$_POST['author'];
            $tag =$_POST['tag'];
            $userId =$_POST['userId'];
            
            
           
        //     $permited  = array('jpg', 'jpeg', 'png', 'gif');
        //     $file_name = $_FILES['image']['name'];
        //     $file_size = $_FILES['image']['size'];
        //     $file_temp = $_FILES['image']['tmp_name'];

        //     $div = explode('.', $file_name);
        //     $file_ext = strtolower(end($div));
        //     $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        //     $uploaded_image = "uploads/".$unique_image;

        //     if($title ="" || $cat ="" || $body ="" || $author ="" || $tag =""){
        //     echo "<span class='error'>Field Must not be empty !!!</span>";
        //    }elseif ($file_size >1048567) {
        //     echo "<span class='error'>Image Size should be less then 1MB!
        //     </span>";
        //    }elseif (in_array($file_ext, $permited) === false) {
        //     echo "<span class='error'>You can upload only:-"
        //     .implode(', ', $permited)."</span>";
        //    } else{
        //    move_uploaded_file($file_temp, $uploaded_image);
           $query = "INSERT INTO tbl_post(cat,title,body,author,tag,userId) 
           VALUES('$cat','$title','$body','$author','$tag','$userId')";
           $inserted_rows = $db->insert($query);
           if ($inserted_rows) {
            echo "<span class='success'>Post Inserted Successfully.
            </span>";
           }else {
            echo "<span class='error'>Post Not Inserted !</span>";
           }

        }
   
        ?>

            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">               
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                <option>Select category</option>
                                 <?php 
                                    $query = "SELECT * FROM tbl_category";
                                    $catename  = $db->select($query);
                                    if($catename){
                                        while($result = $catename->fetch_assoc()){
                                 ?>
                                    <option value="<?php echo $result['id'];?>"><?php echo $result['cat_name'];?></option>

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
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author"value="<?php echo Session::get('username')?>"class="medium" />
                          
                                <input type="hidden" name="userId" value="<?php echo Session::get('userId')?>"class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tag</label>
                            </td>
                            <td>
                                <input type="text" name="tag" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                        
						<tr>
                            <td></td>
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