<!DOCTYPE html>
<html>
<head>
    <title>Number Operations</title>
</head>
<body>
    <h2>Number Operations</h2>
    <form method="POST">
        Enter a number: <input type="number" name="number" required>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $number = (int)$_POST['number'];
        
        // Fibonacci series
        function fibonacci($n) {
            $fib = [0, 1];
            for ($i = 2; $i < $n; $i++) {
                $fib[$i] = $fib[$i-1] + $fib[$i-2];
            }
            return $fib;
        }

        // Sum of digits
        function sumOfDigits($num) {
            return array_sum(str_split($num));
        }

        $fibSeries = fibonacci($number);
        $digitSum = sumOfDigits($number);

        echo "<h3>Results:</h3>";
        echo "Fibonacci Series: " . implode(", ", $fibSeries) . "<br>";
        echo "Sum of Digits: $digitSum";
    }
    ?>
</body>
</html>
</body>
</html>