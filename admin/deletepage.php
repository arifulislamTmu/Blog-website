
<?php require_once('header.php')?>
<?php
   if(!isset($_GET['delid'] )|| $_GET['delid']==NULL){
        echo"<script>window.location='Editpost.php'</script>";
   }else{
        $id =$_GET['delid'];
        
       $query="DELETE FROM `tbl_post` WHERE `id` = '$id'";
       $result = $db->delete($query);
       if($result){
         echo"<script>alert('You Are  Delete successfully')</script>";
         echo"<script>window.location='index.php'</script>";


       }else{
           echo"Category Not deleted";
       }
   }
?>