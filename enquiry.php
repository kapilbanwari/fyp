<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
$successContact=false;
$errorContact=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    $formType  = $_POST['hidden'];
    if($formType == "contactForm"){
        $name = $_POST['name'];
        $phone = $_POST['number'];
        $email = $_POST['email'];
        $enquiry = $_POST['message'];
        if(!preg_match("/^[A-Za-z][A-Za-z\s\.]{2,50}$/",$name)) {
            $errorContact = 'Please enter correct name. Allowed chars [A-Z, a-z, .] min:2, max:50';
        }
        elseif(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.(?:[A-Za-z]{2}|com|org|net|edu|gov|mil|biz|info|mobi|name|aero|asia|jobs|co)$/",$email)) {
            $errorContact = 'Please enter correct email';
        }
        elseif(!preg_match("/^\d{10}$/", $phone)){
            $errorContact = 'Please enter a valid Phone Number';
        }
        if(!$errorContact) {
            $subject = 'Pockket Enquiry';
            $message = "Name : $name\r\nEmail: $email\r\nPhone: $phone\r\nMessage: $enquiry";
            mail('kapilbanwari@weddinggaadi.com', $subject, $message, 'From:root@sudofire.com');
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

<form method="post" class="contactForm">
<input type="hidden" class="form-control" value="contactForm" name="hidden" required="">
    <div class="row">
        <div class="col-12 my-2">
        <input type="text" class="form-control"  placeholder="Enter Name" name="name">
        </div>
        <div class="col-12 my-2">
        <input type="text" class="form-control"  placeholder="Enter Contact Number" name="number">
        </div>
        <div class="col-12 my-2">
        <input type="email" class="form-control" placeholder="Enter Email" name="email">
        </div>
        <div class="col-12 my-2">
        <textarea name="message" class="form-control" placeholder="How Can We Help You"></textarea>
        </div>
    </div>
    <div class="col-12 my-2 text-center">
        <button type="submit" class="submit-form mt-3">Submit</button>
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
            $('html, body').animate({scrollTop: $("#contact-form").offset().top - 50}, 2000);
    });
</script>
<?php } ?>
