<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="style.css">
    
    <?php
        $query = "SELECT * FROM tbl_theme where id='1'";
        $selectq = $db->select($query);
        while($results = $selectq->fetch_assoc()){
         if($results['theme']=='defoult'){ ?>
            <link rel="stylesheet" href="theme/defoult.css">
        <?php }elseif($results['theme']=='green'){ ?>
        <link rel="stylesheet" href="theme/green.css">
       <?php  }elseif($results['theme']=='red'){ ?>
       <link rel="stylesheet" href="theme/red.css">
      <?php } ?>
      <?php }?>
            