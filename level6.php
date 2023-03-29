<!DOCTYPE html>
<html>
<head>
	<title>Random Numbers Form</title>
</head>
<body>
	<h2>Random Numbers Form</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="numbers">Identify the maximum and minimum numbers:</label>
		<br><br>
		<?php
		// Generate an array of 6 different random numbers
		$numbers_array = array();
		for ($i = 0; $i < 6; $i++) {
			$number = rand(1, 49); // generates a random number between 1 and 49
			while (in_array($number, $numbers_array)) {
				$number = rand(0, 100);
			}
			array_push($numbers_array, $number);
		}
		$numbers = implode(", ", $numbers_array); // join the numbers into a string
		echo "<p>$numbers</p>";
		echo "<input type='hidden' name='numbers' value='$numbers'>"; // store the numbers in a hidden input field
		?>
		<label for="min_number">Minimum number:</label>
		<input type="number" id="min_number" name="min_number" required required maxlength="1">
		<br><br>
		<label for="max_number">Maximum number:</label>
		<input type="number" id="max_number" name="max_number" required required maxlength="1">
		<br><br>
		<input type="submit" name="submit" value="Submit">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$numbers = $_POST["numbers"];
		$numbers_array = explode(", ", $numbers);
		$min_number = $_POST["min_number"];
		$max_number = $_POST["max_number"];

		// Check if the user's inputs match the generated numbers
		if (min($numbers_array) == $min_number && max($numbers_array) == $max_number) {
			echo "Congratulations! You correctly identified the minimum and maximum numbers.<br>";
		} else {
			echo "Sorry, you did not correctly identify the minimum and maximum numbers.<br>";
		}
	}
	?>
</body>
</html>
