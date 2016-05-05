<?
// php 邮箱验证函数


// http://www.runoob.com/php/php-form-url-email.html


function checkEmail($email) 
{
   // Create the syntactical validation regular expression
   $regexp = "^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$";
 
   // Presume that the email is invalid
   $valid = 0;
 
   // Validate the syntax
   if (eregi($regexp, $email))
   {
      list($username,$domaintld) = split("@",$email);
      // Validate the domain
      if (getmxrr($domaintld,$mxrecords))
         $valid = 1;
   } else {
      $valid = 0;
   }
 
   return $valid;
 
}
?>

******************************************************************************************************

<?php
// 定义变量并设为空值
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if (empty($_POST["name"]))
    {$nameErr = "Name is required";}
  else
    {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name))
      {
      $nameErr = "Only letters and white space allowed";
      }
    }

  if (empty($_POST["email"]))
    {$emailErr = "Email is required";}
  else
    {
    $email = test_input($_POST["email"]);
    // check if e-mail address syntax is valid
    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
      {
      $emailErr = "Invalid email format";
      }
    }

  if (empty($_POST["website"]))
    {$website = "";}
  else
    {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
      {
      $websiteErr = "Invalid URL";
      }
    }

  if (empty($_POST["comment"]))
    {$comment = "";}
  else
    {$comment = test_input($_POST["comment"]);}

  if (empty($_POST["gender"]))
    {$genderErr = "Gender is required";}
  else
    {$gender = test_input($_POST["gender"]);}
}
?>