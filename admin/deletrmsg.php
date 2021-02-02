
<?php require_once('header.php')?>
<?php
   if(!isset($_GET['delid'] )|| $_GET['delid']==NULL){
        echo"<script>window.location='inbox.php'</script>";
   }else{
        $id =$_GET['delid'];
        
       $query="DELETE FROM `tbl_contact` WHERE `tbl_contact`.`id` = '$id'";
       $result = $db->delete($query);
       if($result){
         
        echo"<script>alert('message delete successfull !!')</script>";
        echo"<script>window.location='inbox.php'</script>";

       }else{
           echo"message Not deleted";
       }
   }
?>