<?php require_once('header.php')?>
<?php require_once('sidebar.php')?>
<?php 
  if(!Session::get('userRole')=='0'){
    echo"<script>window.location='index.php'</script>";
  }
?>
        <div class="grid_10">
    
         <div class="box round first grid">
           <h2>Add New User</h2>
               <div class="block copyblock"> 
            <?php
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    $username = $fm->validation($_POST['username']);
                    $password = $fm->validation(md5($_POST['password']));
                    $role     = $fm->validation($_POST['role']);

                    $username = mysqli_real_escape_string($db->link, $username);
                    $password = mysqli_real_escape_string($db->link, $password);
                    $role = mysqli_real_escape_string($db->link, $role);
                    if(empty($username)|| empty($password)|| empty($role)){
                        echo "<span class='error'>Field Must not be empty !!!</span>";
                    }else{
                        $query ="insert into tbl_user (username,pass,role) values('$username','$password','$role')";
                        $catinsert = $db->insert($query);
                        if($catinsert){
                            echo "<span class='success'>User Insert Successfull.</span>";
                        }else{
                            echo "<span class='error'>User Not Inserted !!!</span>";
                    
                   }
                }
            }
        ?>
            
                 <form action="" method="POST">
                    <table class="form">					
                      
                        <tr>
                           <td>
                             <label> User Name</label>
                           </td>
                            <td>
                                <input type="text" name="username" placeholder="Enter Your Name..." class="medium" />
                            </td>
                        </tr>   <tr>
                           <td>
                             <label>Password</label>
                           </td>
                            <td>
                                <input type="password" name="password" placeholder="Enter Your Password..." class="medium" />
                            </td>
                        </tr> 
                       
                        <tr>
                           <td>
                             <label> User Role</label>
                           </td>
                            <td>
                                <select id="select" name="role" >
                                   <option >Select Admin Role</option>
                                   <option value='0'>Admin</option>
                                   <option value='1'>Author</option>
                                   <option value='2'>Eiditor</option>
                                </select> 
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