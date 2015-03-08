<?php 
//session_start();
 error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
$pageTitle='Contact us';
        include("Includes/header.php");   
        $success_msg='';      
        
        include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
        
        $securimage = new Securimage();

        if(!empty($_POST['query']) && !empty($_POST['captcha_code']) && $securimage->check($_POST['captcha_code'])){
            $name=$_POST['name'];
            $phone=$_POST['phone'];
            $mail=$_POST['email'];
            $query=$_POST['query'];
            $msg='<table>'.
            '<tr><td>Name:</td><td>'.$name.'</td></tr>'.
            '<tr><td>phone:</td><td>'.$phone.'</td></tr>'.
            '<tr><td>mail:</td><td>'.$mail.'</td></tr>'.
            '<tr><td>query:</td><td>'.$query.'</td></tr>'.
            '</table>';            
            $headers = "From: query@concilium.in" . "\r\n" ;
$headers  .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers  .= "CC: concilium.madras@gmail.com,sureshkumarn86@gmail.com";
            mail("admin@concilium.in","Query/Feedbak from Concilium.in",$msg,$headers);
            $success_msg='Your Query/Feedback received. Thanks.';
        }
?>
<div id="contact-content">
<img src="resource/image/conciliumoff.png" style="max-width: 80%" alt="Concilium Office"/>
   <h3> "Concilium Secretariat, Madras"</h3>
    <div>
    <div id="address-div" class="float-left">
        <h3>CONCILIUM SECRETARIAT</h3>
	 <p> 

Asian Centre for Cross-Cultural Studies,<br/>
40/6A, Panayur Kuppam Road,<br/>
Sholinganallur Post,<br/>
Panayur, Madras 600119<br/>
INDIA<br/>
Phone : +91-44 24530682<br/>
Fax : +91-44 24530443<br/>
Email : Concilium.madras@gmail.com<br/></p>
        </div>
    <div id="feedback-form" class="float-right">
    
    <h3>Feedback/Query Form</h3>
    <?php 
            if($success_msg!=''){
                echo $success_msg;
            }else{
        ?>
        <form method="post">
    <label for="name">Name:</label><br/>
    <input name="name" id="name" placeholder="Your Name"/><br/>
    <label for="phone">Phone:</label><br/>
    <input name="phone" id="phone" placeholder="Your Phone Number"/><br/>
    <label for="mail">E-mail:</label><br/>
    <input name="email" id="mail" placeholder="E-Mail"/><br/>
    <label for="query">Feedback/Query:</label><br/>
    <input name="query" id="query" placeholder="Feedback/Query"/><br/>
    <label for="query">Verification Code:</label><br/>
    
    <img id="captcha" src="/securimage/securimage_show.php" style="max-width: 180px" alt="CAPTCHA Image" /><br/>
<a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[new]</a>
 <br/>   <input type="text" name="captcha_code"  maxlength="6" placeholder="Verification Code" title="Please Type the code shown above."/>
<?php 
if (isset($_POST['captcha_code']) && $securimage->check($_POST['captcha_code']) == false) {
	// the code was incorrect
	// you should handle the error so that the form processor doesn't continue

	// or you can use the following code if there is no validation or you do not know how
	echo "<br/> The security code entered was incorrect.";
}
?>
<br/><br />
            <button type="submit">Send</button>
            </form>
    <?php } ?>
    </div>
        <br class="clear"/>
        </div>
    
<!-- Facebook Badge START --><a target="_blankfb"  href="https://www.facebook.com/pages/Concilium-India/403532689810804" title="Concilium India" style="font-family: &quot;lucida grande&quot;,tahoma,verdana,arial,sans-serif; font-size: 11px; font-variant: normal; font-style: normal; font-weight: normal; color: #3B5998; text-decoration: none;" target="_TOP">Follow Us..</a><span style="font-family: &#039;lucida grande&#039;,tahoma,verdana,arial,sans-serif;font-size: 11px;line-height: 16px;font-variant: normal;font-style: normal;font-weight: normal;color: #555555;text-decoration: none;">&nbsp;</span><br /><a target="_blankfb"  href="https://www.facebook.com/pages/Concilium-India/403532689810804" title="Concilium India" target="_TOP"><img class="img" src="https://badge.facebook.com/badge/403532689810804.415.766320860.png" style="border: 0px;max-width:90%;" alt="" /></a><!-- Facebook Badge END -->
<br/>
    <br/>
    <p>Concilium Subscription Form
Individual issues can now be bought at our new website <a href="http://www.conciliumjournal.co.uk">www.conciliumjournal.co.uk</a>
 - Individual Annual Subscription ( Five Issues )
- Electronic Subscription Form</p>

    <h4>SCM-Canterbury Press (Concilium)</h4>

Hymns Ancient & Modern Ltd,<br/>
13a Hellesdon Park Road,<br/>
Norwich NR6 5DR,<br/>
United Kingdom<br/>

</div>
<?php 
    include ("Includes/footer.php");
 ?>