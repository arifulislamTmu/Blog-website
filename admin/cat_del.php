<?php
 require_once('../lib/Session.php');
   Session::chackSession();
?>
<?php require_once('header.php')?>
<?php
   if(!isset($_GET['delcatid'] )|| $_GET['delcatid']==NULL){
        echo"<script>window.location='catlist.php'</script>";
   }else{
        $id =$_GET['delcatid'];
        
       $query="DELETE FROM `tbl_category` WHERE `id` = '$id'";
       $result = $db->delete($query);
       if($result){
         echo"<script>window.location='catlist.php'</script>";

       }else{
           echo"Category Not deleted";
       }
   }
?>