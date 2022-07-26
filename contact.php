<?php
  
if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $visitor_message = "";
    $email_title = "";
    $email_body = "<div>";
    
      
    if(isset($_POST['visitor_name'])) {
        $visitor_name = filter_var($_POST['visitor_name'], FILTER_UNSAFE_RAW);
        $email_body .= "<div>
                           <label><b>Visitor Name:</b></label>&nbsp;<span>".$visitor_name."</span>
                        </div>";
    }
 
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Visitor Email:</b></label>&nbsp;<span>".$visitor_email."</span>
                        </div>";
    }
      
      
      
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
        $email_body .= "<div>
                           <label><b>Visitor Message:</b></label>
                           <div>".$visitor_message."</div>
                        </div>";
    }
      
    
    if(isset($_POST['email title'])) {
         $email_title = "Message from Pier Carson visitor";
    }

    {
        $email_title = "Message from Pier Carson visitor";
        $recipient = "carsonky@twc.com";
        $link_to_piercarson = "https://carsonh.com/PierCarson"; 
        
    }
      
    $email_body .= "</div>";
    
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
      
    if(mail($recipient, $email_title, $email_body, $headers)) {
        echo '<span style="font-size: 20px;"> ' ."<p>Thank you for contacting us, $visitor_name. You will get a reply within 24 hours.</p>";
        
        echo '<p>Please click the logo below to return to the main menu.</p>';
        $image = "Images/piercarsonnav2.PNG";  

echo '<a href="https://www.carsonh.com/PierCarson"><img src="'.$image.'" </a>';
        
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
       
    }
      
} else {
    echo '<p>Something went wrong</p>';
}


?>