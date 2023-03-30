

<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the user's answers from the form submission
    $input = $_POST['input'];

    // Get the correct answers from the hidden inputs in the form
    $letters = $_POST['letters'];
    sort($letters); // sort the letters alphabetically

    // check if input is in alphabetical order
    if (implode('', $input) === implode('', $letters)) {
        echo '<p>Congratulations! You sorted the letters correctly.</p>';
        echo '<p>Your Letters: '.implode(', ', $input).'</p>';
        echo '<a href="Level2f.php" target="_self">Next Level</a>';
    } else {
        // Display wrong message
        echo '<p>Sorry, you sorted the letters incorrectly. Please try again.</p>';
        echo '<p>Your Letters: '.implode(', ', $input).'</p>';
        echo '<a href="Level1f.php" target="_self">Try Again</a>';
   
    }
} else {
    // Generate 6 random letters
    $letters = array();
    while (count($letters) < 6) {
        $letter = chr(rand(97, 122));
        if (!in_array($letter, $letters)) {
            $letters[] = $letter;
        }
    }
    shuffle($letters);
}
?>

<!-- HTML form -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Level3.css">
    <title>Game Level 1</title>
</head>
<body>
    <?php if (!isset($_POST['input'])) { // Display the form if it hasn't been submitted yet ?>
    <h1>Game Level 1: Order alphabets in ascending order</h1>
    <p>A set of 6 different letters generated randomly is shown below. Please use the form available to write them in ascending order (from a to z).</p>
    <p><?php echo implode(', ', $letters); ?></p>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <?php foreach ($letters as $letter) { ?>
        <input type="hidden" name="letters[]" value="<?php echo $letter; ?>" maxlength="1" size="1">
        <label>
            <input type="text" name="input[]" minlength="1" maxlength="1" required>
        </label>
        <br>
        <?php } ?>
        <input type="submit" value="Submit">
    </form>
    <?php } ?>
</body>
</html>
