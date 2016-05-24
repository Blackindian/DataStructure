<?php 
#
header('content-type:text/html;charset=utf-8');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Form Validation by itself!</title>
	<style>
		*{
			/*margin: 0;*/
		}
		i{
			color: #f00;
		}
	</style>
</head>
<body>
	<div>
		<div>
			<h2>PHP Form Validation </h2>
			<h3><mark><span class="error">*</span></mark> required field</h3>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
				<label for="">Name: </label>
				<input id="name" name="name" value="" type="text" required="" placeholder="Html5&CSS3">
				<span class="error">* </span>
				<span class="error" id="error1"></span>
				<br><br>

				<label for="">E-mail: </label>
				<input name="email" value="" type="email" required="" placeholder="abc@ufo.xyz">
				<span class="error">* </span>
				<span class="error" id="error2"></span>
				<br><br>

				<label for="">Website: </label>
				<input name="website" value="" type="url" required="" placeholder="https;//www.anonymous.xyz">
				<span class="error">* </span>
				<span class="error" id="error3"></span>
				<br><br>

				<label for="">Comment: </label>
				<textarea name="comment" rows="5" cols="40" required="" placeholder="share your comments!"></textarea>
				<span class="error">* </span>
				<br><br>

				<label for="">Gender:</label>
				<input name="gender" value="female" type="radio">
				<span>Female</span>
				<input name="gender" value="male" type="radio">
				<span>Male</span>
				<input name="gender" value="secret" type="radio">
				<span>Secret</span>
				<span class="error">* </span>
				<br><br>

				<input name="submit" value="Submit" type="submit">
				<input type="button" onclick="errorForm()" value="errorForm">
			</form>
			<h2>Your Input:</h2><br>
<?php 
			//error
			$nameErr = $emailErr = $genderErr = $commentErr = $websiteErr = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST"){

			  if (empty($_POST["name"])){
			  	$nameErr = "Name is required";
			  	echo "{$nameErr}";
			  }
			  else{
			  	$name = test_input($_POST["name"]);
			  	echo "<mark>{$name}</mark>输入的内容是:{$name}<br/>";
			  }

			  if (empty($_POST["email"])){
			  	$emailErr = "Email is required";
			  	// echo "{$emailErr}";
			  }
			  else{
			  	$email = test_input($_POST["email"]);
			  	echo "<mark>{$name}</mark>输入的内容是:{$email}<br/>";
			  }

			  if (empty($_POST["website"])){
			  	$websiteErr = "url is empty";
			  	// echo "{$websiteErr}";
			  }
			  else{
			  	$website = test_input($_POST["website"]);
			  	echo "<mark>{$name}</mark>输入的内容是:{$website}<br/>";
			  }

			  if (empty($_POST["comment"])){
			  	$commentErr = "comment is empty";
			  	// echo "{$commentErr}";
			  }
			  else{
			  	$comment = test_input($_POST["comment"]);
			  	echo "<mark>{$name}</mark>输入的内容是:{$comment}<br/>";
			  }

			  if (empty($_POST["gender"])){
			  	$genderErr = "Gender is required";
			  	// echo "{$genderErr}";
			  }
			  else{
			  	$gender = test_input($_POST["gender"]);
			  	echo "<mark>{$name}</mark>输入的内容是:{$gender}<br/>";
			  }
			$show = <<<EOD
			<i>name</i> = {$name}<br/>
			<i>email</i> = {$email}<br/>
			<i>website</i> = {$website}<br/>
			<i>comment</i> = {$comment }<br/>
			<i>gender</i> = {$gender}<br/>
EOD;
            echo "<hr/>";
            echo "<mark>{$name}</mark>输入的内容是:<br/><strong>{$show}</strong><br/>";
			}
			// 定义变量并默认设置为空值
			$name = $email = $gender = $comment = $website = "";

			// if ($_SERVER["REQUEST_METHOD"] == "POST")
			// {
			//   $name = test_input($_POST["name"]);
			//   $email = test_input($_POST["email"]);
			//   $website = test_input($_POST["website"]);
			//   $comment = test_input($_POST["comment"]);
			//   $gender = test_input($_POST["gender"]);
			// }

			function test_input($data)
			{
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}

?>
		</div>
	</div>
	<!-- innerHTML -->
	<div class="test">
		<a id="myAnchor" href="http://www.microsoft.com">Microsoft</a>
		<input type="button" onclick="changeLink()" value="Change link">
	</div>
	<div class="js">
		<script>
			function changeLink(){
				var a = "Microsoft";
				b = document.getElementById('myAnchor').textContent;
				if (a == b) {
					document.getElementById('myAnchor').innerHTML="DSQC | xgqfrms";
					document.getElementById('myAnchor').href="https://xgqfrms.github.io/DataStructure/";
					document.getElementById('myAnchor').target="_blank";
				} else {
					document.getElementById('myAnchor').innerHTML="Microsoft";
					document.getElementById('myAnchor').href="http://www.microsoft.com";
					document.getElementById('myAnchor').target="_blank";
				}
			};
			function errorForm(){
				document.getElementById('error1').innerHTML="<?php echo "error:{$name}name is empty!";?>";
				document.getElementById('error2').innerHTML="<?php echo "error:{$email}email is empty!";?>";
				document.getElementById('error3').innerHTML="<?php echo "error:{$website}url is empty!";?>";
			};
			// $error = errorForm();
			function errorCheck(){
				var $empty = "";
				$empty = document.getElementById('name').textContent;
				if ($empty) {
					document.getElementById('error1').innerHTML="<?php echo "error:{$name}name is empty!";?>";
				} else {
					document.getElementById('error1').innerHTML="<?php echo "input name is {$name}";?>";
				}			
			};
			errorCheck();
		</script>
	</div>
</body>
</html>
