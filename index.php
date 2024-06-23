<?php
function convertTemperature($temperature, $conversionType) {
    if ($conversionType === 'F to C') {
        // Fahrenheit to Celsius conversion
        $result = ($temperature - 32) * (5/9);
        return $result;
    } elseif ($conversionType === 'C to F') {
        // Celsius to Fahrenheit conversion
        $result = ($temperature * 9/5) + 32;
        return $result;
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $temperature = $_POST["temperature"];
    $conversionType = $_POST["conversionType"];

    $result = convertTemperature($temperature, $conversionType);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Temperature Converter</title>
</head>
<body>
    <div class="container">
        <h2>Temperature Converter</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="temperature">Temperature:</label>
            <input type="number" name="temperature" required>
            <label for="conversionType">Conversion Type:</label>
            <select name="conversionType" required>
                <option value="F to C">Fahrenheit to Celsius</option>
                <option value="C to F">Celsius to Fahrenheit</option>
            </select>
            <button type="submit" name="submit" class="convert-button">Convert</button>
        </form>

        <?php
        if (isset($result)) {
            echo '<div class="result">' . $temperature . ' degrees ' . $conversionType . ' is ' . number_format($result, 2) . ' degrees ' . ($conversionType === 'F to C' ? 'Celsius' : 'Fahrenheit') . '</div>';
        }
        ?>
    </div>
</body>
</html>
