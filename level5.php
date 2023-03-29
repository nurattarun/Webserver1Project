<!DOCTYPE html>
<html>
<head>
	<title>Level 5</title>
</head>
<body>
	<h2>Identify First and Last Alphabet</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="letters">Identify the first and last letters of this set of 6 different letters:</label>
		<br><br>
		<?php
        //array to generate letters
		$letters_array = array();
		for ($i = 0; $i < 6; $i++) {
			$letter = chr(rand(65, 90) ); // generates a random uppercase letter using ASCII code
			while (in_array($letter, $letters_array)) {
				$letter = chr(rand(65, 90)); //in_array checks if a given value exists in an array or not
			}
			array_push($letters_array, $letter);
		}
		shuffle($letters_array); // shuffles the letters
		$letters = implode("", $letters_array); // used to join elements of an array in a string
		$first_letter = $letters_array[0];
		$last_letter = $letters_array[5];
		echo "<p>$letters</p>";
		echo "<input type='hidden' name='letters' value='$letters'>";
		?>
		<label for="first_letter">First letter:</label>
		<input type="text" id="first_letter" name="first_letter" required maxlength="1"><br><br>
		<label for="last_letter">Last letter:</label>
		<input type="text" id="last_letter" name="last_letter" required maxlength="1"><br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
	<br>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $letters = $_POST["letters"];
        $letters_array = str_split($letters); // convert the string to an array
        $first_letter_input = strtoupper($_POST["first_letter"]);
        $last_letter_input = strtoupper($_POST["last_letter"]);
        $first_letter = $letters_array[0]; // get the first letter from the array
        $last_letter = $letters_array[5]; // get the last letter from the array
        $first_letter_correct = $first_letter_input === $first_letter;
        $last_letter_correct = $last_letter_input === $last_letter;
    
        if ($first_letter_correct && $last_letter_correct) {
            echo "Congratulations! You correctly identified the first and last letters of the set.<br>";
        } else {
            echo "Sorry, you did not correctly identify the first and last letters of the set.<br>";
        }
    }
    
	?>

</body>
</html>
