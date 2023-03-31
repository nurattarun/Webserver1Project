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
}
    
    ?>

    <!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="Level3.css">
        <title>Game Level 3</title>
        <style>
/* style for the body */
body {
    font-family: Arial, sans-serif;
    background-color: #ffffcc;
    color: #333;
    margin: 0;
    padding: 0;
}

/* style for the header */
h1 {
    font-size: 2em;
    text-align: center;
    margin-top: 2em;
}

/* style for the paragraph text */
p {
    font-size: 1.2em;
    line-height: 1.5;
    margin: 1em 0;
}

/* style for the form inputs */
label {
    display: block;
    margin: 1em 0;
    font-size: 1.2em;
}

input[type="text"] {
    padding: 0.5em;
    font-size: 1.2em;
    border: 2px solid #ccc;
    border-radius: 5px;
    outline: none;
}

input[type="submit"] {
    margin-top: 2em;
    padding: 0.5em 1em;
    font-size: 1.2em;
    background-color: #FFA500;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

a {
    display: block;
    margin-top: 1em;
    font-size: 1.2em;
    color: #333;
    text-decoration: none;
}

a:hover {
    color: #666;
}

/* Additional CSS for input fields and buttons alignment */
form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

label {
    display: flex;
    justify-content: center;
}

input[type="text"] {
    margin: 0 0 10px 0;
}

input[type="submit"] {
    margin-top: 20px;
    margin-bottom: 10px;
}

</style>
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
        <hr>
    </form>
    <div style="text-align: center;">
        <a href="Login.php" target="_self" style="font-size: 20px;">Sign Out</a>
        <a href="stop_session.php" target="_self" style="font-size: 20px;">Stop this Session</a>
    </div>
</body>
</html>
