<?php 
        //require_once ("Includes/simplecms-config.php"); 
       // require_once  ("Includes/connectDB.php");
        include("Includes/header.php");         
     ?>
<div style="text-align: center;">
        <div style="text-align: left;margin: 0 auto;max-width: 1024px;position: relative">
            <div>
                

<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 600px; height: 300px;">
    <!-- Slides Container -->
    <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 600px; height: 300px;">
        <div><img u="image" src2="resource/image/slide/slide1.jpg" /></div>
        <div><img u="image" src2="resource/image/slide/slide2.jpg" /></div>
        <div><img u="image" src2="resource/image/slide/slide3.jpg" /></div>
        <div><img u="image" src2="resource/image/slide/slide4.jpg" /></div>
    </div>
</div>
                
            <strong>Concilium</strong> welcomes to the journal portal the world of theology, peace and prosperity.
               
<p>
Concilium is a theological review, perhaps, the most subscribed in the world.
It is published five times a year.
    </p>
                
                <ul id="issue-link">
                <li class="current-issue"><a href="current-issues"> Current Issues</a></li>
                <li class="future-issue"><a href="future-issues">Future Issues</a> </li>
            <li class="clear"></li>
                </ul>
           <?php /* <p>
The editors of the review belong to "who's who" in the world of theology.
Each issue takes up and studies a relevant and contemporary theme.
The writers of the articles are chosen from among the best scholars of the question in the world.
                </p>
                */?>
            <br class="clear"/>
        </div>
            <div>
            </div>

            
            <div>
            
                 <h2>Our Mission</h2>
                <p>As a community, the International Association of Conciliar Theology, we journey with people of good will who are sensitive to the challenges of our times. We reflect on Christian tradition (supported by solid scholarship) in the light of cultural and religious experiences and socio-political developments. The Scriptures narrate God's incarnation by which Christ Jesus shares the life of the world. Traces of God's liberating presence are found in stories and struggles of women and men that "have life and have it to the full" (John 10:10).

                    </p>
            </div>
<div align="center" > <!-- Facebook Badge START --><a target="_blankfb"  href="https://www.facebook.com/pages/Concilium-India/403532689810804" title="Concilium India" style="font-family: &quot;lucida grande&quot;,tahoma,verdana,arial,sans-serif; font-size: 11px; font-variant: normal; font-style: normal; font-weight: normal; color: #3B5998; text-decoration: none;" target="_TOP">Follow us on facebook..</a><span style="font-family: &#039;lucida grande&#039;,tahoma,verdana,arial,sans-serif;font-size: 11px;line-height: 16px;font-variant: normal;font-style: normal;font-weight: normal;color: #555555;text-decoration: none;">&nbsp;</span><br /><a target="_blankfb"  href="https://www.facebook.com/pages/Concilium-India/403532689810804" title="Concilium India" target="_TOP"><img class="img" src="https://badge.facebook.com/badge/403532689810804.415.766320860.png" style="border: 0px;max-width:90%;" alt="" /></a><!-- Facebook Badge END --></div>
            <div id="blog-gallery">


            <div id="gallery-brief" class="float-left">
                <h1>Gallery</h1>
            <div>
        <?php 
        $min=1;
        $max=20;
        $rn1=rand($min,$max);
        for($i=$rn1;$i<$rn1+6;$i++){ ?>
                <img alt="gallery" src="/gallery/albums/Annual_meet_2010/Annual_meet_2010 (1<?php echo $i+1?>).JPG"/>
        <?php } ?>
                <br class="clear"/>
                <a href="/gallery/album">Go to Gallery Page&gt;&gt;</a>

            </div>
            </div>
            <div id="recent-news" class="float-left">
            <h1>Recent News</h1>
        <?php 
            $dlimit=10;
            include('getnewslist.php');
            ?>
            </div>
                <br class="clear"/>
            </div>
    </div>
   
    
    </div>
     <script src="resource/js/jssor.slider.mini.js"></script>
<script>
    jQuery(document).ready(function ($) {
        var options = { $AutoPlay: true,$LazyLoading:0 };
        var jssor_slider1 = new $JssorSlider$('slider1_container', options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth) {
                    var sliderWidth = parentWidth;

                    //keep the slider width no more than 800
                    sliderWidth = Math.min(sliderWidth, 600);

                    jssor_slider1.$ScaleWidth(sliderWidth);
                }
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
    });

</script>
<?php 
    include ("Includes/footer.php");
 ?>