<?php 
$pageTitle='Phote and Event Galleries';
        include("Includes/header.php");         
?>

<div id="gallery-container">


            <div id="gallery-brief" style="width: auto;float: none;">

            <?php 
 $gals=array('home','2012','2013','home','2012','2013');
 for($j=0;$j<sizeof($gals);$j++){
     ?>
                                <h2><?php echo $gals[$j]?> Gallery</h2>
            <div>
                <?php
     for($i=0;$i<6;$i++){ ?>
                <img alt="gallery" src="resource/image/gallery/<?php echo $gals[$j]?>/img<?php echo $i+1?>.jpg"/>
            <?php } ?>
               </div>
                <br class="clear"/>
                <?php }?>
            </div>

</div>

 

<?php 
    include ("Includes/footer.php");
 ?>