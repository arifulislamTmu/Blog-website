<?php require_once('header.php')?>
<?php require_once('sidebar.php')?>
<style>
   .leftSide{float:left;width:70%}
   .rightSite{float:left;width:20%}
   .rightSite img{width:150px; height:160px;}
</style>
        <div class="grid_10">
        <!-- <?php
          if(isset($_POST['submit'])){
           $title = $fm->validation($_POST['title']);
           $slogan = $fm->validation($_POST['slogan']);
            $title = mysqli_real_escape_string($db->link,$title);
            $slogan = mysqli_real_escape_string($db->link,$slogan);
           
            $permited  = array('png');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $same_image = 'logo'.'.'.$file_ext;
            $uploaded_image = "uploads/".$same_image;

            if($title ="" || $slogan =" "){
            echo "<span class='error'>Field Must not be empty !!!</span>";
           }else{
             if (!empty($file_name)){
                if($file_size > 10482567){
                    echo "<span class='error'>Image Size should be less then 1MB!
                    </span>";
                }elseif (in_array($file_ext, $permited) === false) {
         echo "<span class='error'>You can upload only:-"
            .implode(', ', $permited)."</span>";
           } else{
           move_uploaded_file($file_temp, $uploaded_image);
           $query = "UPDATE tbl_slogan 
           SET title='$title',
           slogan='$slogan',
           image='$uploaded_image'
           where id = '1'
           ";
           $inserted_rows = $db->update($query);
           if ($inserted_rows) {
            echo "<span class='success'>Data update  Successfully.
            </span>";
           }else {
            echo "<span class='error'>Post Not Inserted !</span>";
           }
        }
        }
    }
}
 ?> -->
        <?php 
          $query = "SELECT * FROM tbl_slogan";
          $titleSlogan = $db->select($query);
          if($titleSlogan){
            while($results=$titleSlogan->fetch_assoc()){
         ?>
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock"> 
                <div class="leftSide"> 

                <form action="" method="POST" enctype="multipart/form-data">
                     <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php  echo $results['title'];
            ?>" name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" name="slogan" value="<?php echo $results['slogan'];
            ?>" class="medium" />
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
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    </div>
                    <div class="rightSite">
                      <img src="<?php echo $results['image']?>" alt="logo">
                 </div>
            <?php } } ?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
   <?php require_once('footer.php')?>

