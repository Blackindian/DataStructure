<?php 
#
header('content-type:text/html;charset=utf-8');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Form Validation by itself!</title>
</head>
<body>
	<div>
		<div>
			<h2>PHP Form Validation </h2>
			<h3><mark><span class="error">*</span></mark> required field</h3>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
				<label for="">Name: </label>
				<input name="name" value="" type="text" required="" placeholder="Html5&CSS3">
				<span class="error">* </span>
				<br><br>
				<label for="">E-mail: </label>
				<input name="email" value="" type="email" required="" placeholder="abc@ufo.xyz">
				<span class="error">* </span>
				<br><br>
				<label for="">Website: </label>
				<input name="website" value="" type="url" required="" placeholder="https;//www.anonymous.xyz">
				<span class="error">* </span>
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
			</form>
			<h2>Your Input:</h2><br><br><br><br>
			<?php 
			// 定义变量并默认设置为空值
			$name = $email = $gender = $comment = $website = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
			  $name = test_input($_POST["name"]);
			  $email = test_input($_POST["email"]);
			  $website = test_input($_POST["website"]);
			  $comment = test_input($_POST["comment"]);
			  $gender = test_input($_POST["gender"]);
			}

			function test_input($data)
			{
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
			$show = <<<EOD
			        name = {$name}<br/>
			        email = {$email}<br/>
			        website = {$website}<br/>
			        comment = {$comment }<br/>
			        gender = {$gender}<br/>
EOD;
			echo "<mark>{$name}</mark>输入的内容是:<br/>{$show}";
			?>

		</div>
	</div>
</body>
</html>
