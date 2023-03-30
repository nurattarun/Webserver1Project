<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the user's answers from the form submission
    $answers = $_POST['answers'];

    // Get the correct answers from the hidden inputs in the form
    $numbers = $_POST['numbers'];
    sort($numbers);

    // Check the user's answers against the correct answers
    $correct = true;
    for ($i = 0; $i < count($answers); $i++) {
        if ($answers[$i] != $numbers[$i]) {
            $correct = false;
            break;
        }
    }

    // Display the results
    if ($correct) {

        echo '<p>Congratulations! You sorted the numbers correctly.</p>';
        echo '<p>Your Numbers: '.implode(', ', $answers).'</p>';
        echo '<a href="Level4f.php">Next Level</a>';
    } else {
        echo '<p>Sorry, you sorted the numbers incorrectly. Please try again.</p>';
        echo '<a href="Level3f.php">Try Again</a>';
    }
} else {
    // Generate 6 random numbers
    $numbers = array();
    for ($i = 0; $i < 6; $i++) {
        $numbers[] = rand(0, 100);
    }

    
    ?>

    <!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="Level3.css">
        <title>Game Level 3</title>
    </head>
    <body>
        <h1>Game Level 3: Order numbers in Ascending order</h1>
        <p>A set of 6 different numbers generated randomly is shown below. Please use the form available to write them in ascending order (from 0 to 100).</p>
        <p><?php echo implode(', ', $numbers); ?></p>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <?php foreach ($numbers as $number) { ?>
                <input type="hidden" name="numbers[]" value="<?php echo $number; ?>">
                <label>
                    <input type="number" name="answers[]" min="0" max="100" required>
                </label>
                <br>
            <?php } ?>
            <input type="submit" value="Submit">
        </form>
    </body>
    </html>

<?php } ?>
