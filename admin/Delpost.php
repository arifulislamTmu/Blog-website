
<?php require_once('header.php')?>
<?php
   if(!isset($_GET['Delpageid'] )|| $_GET['Delpageid']==NULL){
        echo"<script>window.location='index.php'</script>";
   }else{
        $id =$_GET['Delpageid'];
        
       $query="DELETE FROM `tbl_pages` WHERE `tbl_pages`.`id` = '$id'";
       $result = $db->delete($query);
       if($result){
         echo "deleted gsfdgsgsgsdgsdg";
        echo"<script>alert('page delete successfull !!')</script>";
        echo"<script>window.location='index.php'</script>";

       }else{
           echo"Category Not deleted";
       }
   }
?>