<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $name = htmlspecialchars($_POST["InputName"]);   
    $email = htmlspecialchars($_POST["InputEmail"]);
    $phone = htmlspecialchars($_POST["InputNumber"]);
    $address1 = htmlspecialchars($_POST["InputAddress1"]);
    $address2 = htmlspecialchars($_POST["InputAddress2"]);
   

    switch ($_POST["id"]) {
        case 'volunteerForm':
            $name .= ' '.htmlspecialchars($_POST["LastName"]);
            $message = '<p>City: '. htmlspecialchars($_POST["InputCity"]).'</p>';
            $message = '<p>Profession: '. htmlspecialchars($_POST["InputProfession"]).'</p>';
            $message = '<p>Address 1: '. htmlspecialchars($_POST["InputAddress1"]).'</p>';
            $message = '<p>Address 2: '. htmlspecialchars($_POST["InputAddress2"]).'</p>';
            $message .= '<p>Phone Number: '. htmlspecialchars($_POST["InputNumber"]).'</p>';
            break;


        case 'donateForm':
            $name .= ' '.htmlspecialchars($_POST["LastName"]);
            $message = '<p>Address 1: '. htmlspecialchars($_POST["InputAddress1"]).'</p>';
            $message = '<p>Address 2: '. htmlspecialchars($_POST["InputAddress2"]).'</p>';
            $message .= '<p>Phone Number: '. htmlspecialchars($_POST["InputNumber"]).'</p>';
            break;
      

        case 'contactForm':
            $name .= ' '.htmlspecialchars($_POST["InputSurname"]);            
            $message = '<p>Preferred Time: '. htmlspecialchars($_POST["InputTime"]).'</p>';
            $message .= '<p>Country: '. htmlspecialchars($_POST["InputCountry"]).'</p>';
            $message .= '<p>Phone Number: '. htmlspecialchars($_POST["InputNumber"]).'</p>';
            break;    

        default:
            $message = htmlspecialchars($_POST["InputMessage"]);
            break;
                    
    }    

    $to = "yourmail@gmail.com"; // Replace with your email address
    $subject = "Form Submission";

    $headers = "From: $email";
    $headers .= "Reply-To: $email";
    
    $mailBody = "Name: $name\n";
    $mailBody .= "Email: $email\n";
    $mailBody .= "Phone: $phone\n";
    $mailBody .= "Message:\n$message";

    $to = "yourmail@gmail.com"; // Replace with your email address
    $subject = "Politixy contact";

    $message_2 = '<html>
    <head>
        <title>Politixy Contact Form</title>
        <style>
            body{
                color: #000;
            }
            .custom-container-1{
                max-width: 600px;                
                padding: 30px;
                text-align: center;
                border: 1px solid #dadce0;    
                background-color: rgb(242, 241, 235) ;
                margin: 1.5rem auto 1.5rem auto;                           
            }
            .logo{
                margin: 20px 0;
                text-align: center;
            }
            .logo img{
                width: 219px;
                height: 31px;
            }
            .table-contents{
                padding: 0 20px 20px 20px;
                display: block;  
            }
            table{
                border: none;
                text-align: left;
            }
            td,th{
                border-bottom: 1px solid #dadce0;
                padding: 7px 15px;
                vertical-align: top;
            }            
            th{                
                padding-left: 0;
                width: 150px;
            }
            h2{
                margin: 0 0 16px 0;
            }
            table p{
                padding: 0;
                margin-top: 0;
            }
            .custom-container-1 p{
                padding: 20px 0 0 0;
                margin-bottom: 0;
                font-size: 15px;
                color: #000;
            }
        </style>
    </head>
    <body>
        <div class="container custom-container-1 container-position">
            <div class="logo">           
                <img src="https://themeperch.net/html/politixy/assets/images/logo-dark.png" alt="politixy">
            </div>
            <div class="table-contents">
                <h2>politixy Contact</h2>
                <table>
                <tr>
                    <th>Name</th>
                    <td>'.$name.'</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>'.$email.'</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>'.$phone.'</td>
                </tr>
                <tr>
                    <th style="border-bottom: 0;">Message</th>
                    <td style="border-bottom: 0;">'.$message.'</td>
                </tr>
                </table>

                <p>&copy; 2024, politixy, All Rights Reserved</p>
            </div>  
        </div>      
    </body>
</html>
    ';

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <webmaster@themeperch.net>' . "\r\n";
    //$headers .= 'Cc: myboss@example.com' . "\r\n";
    $sender_message = '<html>
    <head>
        <title>Politixy Contact</title>
        <style>
            body{
                color: #000;
            }
            .custom-container-1{
                max-width: 600px;                
                padding: 30px;
                text-align: center;
                border: 1px solid #dadce0;    
                background-color: rgb(242, 241, 235)                            
            }

            .logo{
                margin: 20px 0;
                text-align: center;
            }
            .logo img{
                width: 219px;
                height: 31px;
            }
            .table-contents{
                padding: 0 20px 20px 20px;
                display: block;  
            }
            table{
                border: none;
                text-align: left;
            }
            td,th{
                border-bottom: 1px solid #dadce0;
                padding: 7px 15px;
                vertical-align: top;
            }            
            th{                
                padding-left: 0;
                width: 150px;
            }
            h2{
                margin: 0 0 16px 0;
            }
            table p{
                padding: 0;
                margin-top: 0;
            }
            .custom-container-1 p{
                padding: 20px 0 0 0;
                margin-bottom: 0;
                font-size: 15px;
                color: #000;
            }
            .custom-container-2{                
                margin: 0;
                padding: 30px 0 40px 0;  
                max-width: 600px;         
            }    
            
            .custom-container-2 p{
                padding: 0;
                color: #000;
                font-size: 16px;
                margin-top: 0;
            }        
            .message-body p{
                margin-bottom: 25px;
            }
            .message-footer p{                
                margin: 0;
            }
        </style>
    </head>
    <body>
        <div class="container custom-container-2">
            <div class="message-body">
                <p>Hi</p>
                <p>Thanks for getting in touch! This is an automatic email just to let you know that we have received your email. We will get you an answer shortly.</p>
                <p>If you would like to email an update before you hear back from us, please reply to this email. In the meantime, feel free to check out our Help Center resources for more help.</p>                
            </div> 
            <div class="message-footer">
                <p>Kind regards,</p>
                <p>Themeperch Ltd.</p>
            </div>
        </div> 
        <div class="container custom-container-1">
            <div class="logo">           
                <img src="https://themeperch.net/html/politixy/assets/images/logo.png" alt="politixy">
            </div>
            <div class="table-contents">
                <h2>politixy Contact</h2>
                <table>
                <tr>
                    <th>Name</th>
                    <td>'.$name.'</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>'.$email.'</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>'.$phone.'</td>
                </tr>
                <tr>
                    <th style="border-bottom: 0;">Message</th>
                    <td style="border-bottom: 0;">'.$message.'</td>
                </tr>
                </table>

                <p>&copy; 2024, politixy, All Rights Reserved</p>
            </div>  
        </div>     
    </body>
</html>';

    if(mail($email,$subject,$sender_message,$headers)){
        if(mail($to,$subject,$message_2,$headers)){
            echo json_encode([
                'error' => 0,
                'msg' => 'Your information is sent successfully.'
            ]);
        }
    }else{
        echo json_encode([
            'error' => 1,
            'msg' => 'Something went wrong!! Enter valid email or reload the page & try again.'
        ]);
    }
  
} else {
    echo json_encode([
        'error' => 1,
        'msg' => 'Something went wrong!! Enter valid email or reload the page & try again.'
    ]);
}