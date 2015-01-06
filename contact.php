<?php 
 error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
$pageTitle='Contact us';
        include("Includes/header.php");   
        $success_msg='';      
        if(!empty($_POST['query'])){
            $name=$_POST['name'];
            $phone=$_POST['phone'];
            $mail=$_POST['mail'];
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
<img src="resource/image/conciliumoff.png"  alt="Concilium Office"/>
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
    <input name="mail" id="mail" placeholder="E-Mail"/><br/>
    <label for="query">Feedback/Query:</label><br/>
    <input name="query" id="query" placeholder="Feedback/Query"/><br/>
            <button type="submit">Send</button>
            </form>
        <?php } ?>
    </div>
        <br class="clear"/>
        </div>
<br/>
    <br/>
    <p>Concilium Subscription Form
Individual issues can now be bought at our new website <a href="www.conciliumjournal.co.uk">www.conciliumjournal.co.uk</a>
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