<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
</head>
<br />
<div class="inner contact">
                <div class="contact-form">
                    <form id="contact-us" method="post"action="#">
                        <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">
                            <input type="text" name="name" id="name" required="required" class="form" placeholder="Name" />
                            <input type="email" name="mail" id="mail" required="required" class="form" placeholder="Email" />
                            <input type="text" name="subject" id="subject" required="required" class="form" placeholder="Subject" />
                        </div>
                        <div class="col-xs-6 wow animated slideInRight" data-wow-delay=".5s">
                            <textarea name="message" id="message" class="form textarea"  placeholder="Message"></textarea>
                        </div>
                        <div class="relative fullwidth col-xs-12">
                            <button type="submit" id="submit" name="submit" class="form-btn semibold">Send Message</button> 
                        </div>
                        <div class="clear"></div>
                    </form>
                    <div class="mail-message-area">
                        <div class="alert gray-bg mail-message not-visible-message">
                            <strong>Thank You !</strong> Your email has been delivered.
                        </div>
                    </div>
                </div>
            </div>
</html>

  <?php
    require 'vendor/autoload.php';
    $api_key ="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";

     if(isset($_post['submit']))
     {
        $name = $_post['name'];
        $email_id = $_post['email'];
        $subject = $_post['subject'];
        $message = $_post['message'];

         $email = new \SendGrid\Mail\Mail(); 
         $email->setFrom("support@saltnow.xyz", "Thank You For Subscribing");
         $email->setSubject($subject);
         $email->addTo($email_id, $name);
         $email->addContent("text/plain",$message);
         $sendgrid = new \SendGrid($api_key);
         
         if($sendgrid->send($email));
         {
            echo "Email Sent Successfully.";
         }
     
}
?>


