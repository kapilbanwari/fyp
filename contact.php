<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
$successContact=false;
$errorContact=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    $formType  = $_POST['hidden'];
    if($formType == "contactForm"){
        
      
        $email = $_POST['email'];
        $enquiry = $_POST['message'];
     
        if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.(?:[A-Za-z]{2}|com|org|net|edu|gov|mil|biz|info|mobi|name|aero|asia|jobs|co)$/",$email)) {
            $errorContact = 'Please enter correct email';
        }
        
        if(!$errorContact) {
            $subject = 'Enquiry';
            $message = "Name : $name\r\nEmail: $email\r\nPhone: $phone\r\nMessage: $enquiry";
            mail('bishnu@sudofire.com, avantika@sudofire.com, shivansh@sudofire.com', $subject, $message, 'From:root@sudofire.com');
            $successContact=true;
        }
    }
}
?>


<?php
if(!$successContact) {
    if($errorContact) {
?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <p class="text-center error_msg"><?php echo $errorContact ?></p>
</div>
<?php } ?>

<form method="post" class="contactForm" style="padding-bottom:50px; margin-top:-20px ">
    <input type="hidden" class="form-control" value="contactForm" name="hidden" required="">
    <div class="input-container-seven" style="margin-bottom:-50px">
          <label  class="mt-5">Your email</label> <br />
          <input type="text" name="email"/> <br />
          <label >Message</label> <br />
          <input type="text" name="message"/>
        </div>
        <div class="button-container-seven pull-right mr-5 mt-4">
          <button type="submit"><span >Send</span></button>
        </div>
</form>

<?php } else { ?>

<div class="col-md-12 col-sm-12 col-xs-12">
    <h6 class="text-center success_msg">Thanks for showing your interest. We'll get back to you soon!</h6>
</div>
<?php } ?>

<?php if($errorContact || $successContact) { ?>
<script>
    $(document).ready(function(){
            $('html, body').animate({scrollTop: $("#admission-enq").offset().top - 50}, 2000);
    });
</script>
<?php } ?>