<?php 
$emailto = "mrbushido90@gmail.com";
$subject = "Testing Sending Emails";
$body = "This is the body of the email";
$header = "From: abdelmagidahmed23@gmail.com";

if(mail($emailto,$subject,$body,$header)){
    echo "Email sent successfully";

} else {
    echo "Failed to send the email";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sending Emails</title>
</head>
<body>
    
</body>
</html>