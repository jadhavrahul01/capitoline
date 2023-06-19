<?php
  $name = htmlspecialchars($_POST['name']);
  $phone = htmlspecialchars($_POST['phone']);
  $email = htmlspecialchars($_POST['email']);
  $website = htmlspecialchars($_POST['location']);
  $message = htmlspecialchars($_POST['enquiry']);

  if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "rj593343@gmail.com"; //enter that email address where you want to receive all messages
      $subject = "From: $name <$email>";
      $body = "Name: $name\nPhone: $phone\nEmail: $email\nLocation: $website\n\nLoan Enquiry:\n$message\n\nRegard,\n$name";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){
        //  echo "Your message has been sent";
         header("Location: thankyou.html");
      }else{
         echo "Sorry, failed to send your message!";
      }
    }else{
      echo "Enter a valid email address!";
    }
  }else{
    echo "Email and message field is required!";
  }
?>