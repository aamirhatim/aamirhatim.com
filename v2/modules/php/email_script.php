<?php
$to = "aamir300@gmail.com";

$name = $_POST['name'];

$address = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$headers = "From: aamirhatim.com <aamir@aamirhatim.com>"; 

mail("$to", "$subject", "$message"."\r\n\r\n".$name."\r\n".$address, $headers);
mail("$address", "To aamirhatim.com: ".$subject, "Thanks for reaching out! Here's a copy of your message:\r\n\r\n".$message, $headers);
print "Sent! Click <a href = 'http://aamirhatim.com'>here</a> to go back to the home page.";
?>