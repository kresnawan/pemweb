<!DOCTYPE html>
<html>
    <head>
        <style>
            .inp {
                max-width: 60px;
            }
            .submit {
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <h1>Kalkulator</h1>
        <form method="post">
            <input class="inp" type="number" name="input1">
            <select name="operand">
                <option value="*">x</option>
                <option value="/">/</option>
                <option value="+">+</option>
                <option value="-">-</option>
            </select>
            <input class="inp" type="number" name="input2">
            <span>=</span>
            <?php
            $inp1 = $_POST["input1"];
            $inp2 = $_POST["input2"];
            $opr = $_POST["operand"];
            if ($opr == "*") {
                echo $inp1 * $inp2;
            } elseif ($opr == "/") {
                echo $inp1 / $inp2;
            } elseif ($opr == "+") {
                echo $inp1 + $inp2;
            } elseif ($opr == "-") {
                echo $inp1 - $inp2;
            }
            ?>
            <br />
            <input type="submit" class="submit">
        </form>
        <br />
        <p>
            oleh<br />
            Kresnawan Restu Sanjaya<br />
            255150400111034
        </p>
    </body>
</html>
