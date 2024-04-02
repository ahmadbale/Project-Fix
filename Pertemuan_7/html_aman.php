<!DOCTYPE html>
<html>
    <head>
        <title>Form Input PHP</title>
    </head>
    <body>
        <h2>Form Input PHP</h2>
        <?php
        $inputErr="";
        $emailErr="";
        $input="";
        $email="";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["input"])){
                $inputErr= "Input harus diisi<br>";
        } else {
            $input = $_POST['input'];
            $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
            echo "Data berhasil disimpan";
        }
        if (empty($_POST["email"])) {
            $emailErr = "Email harus diisi<br>";
        } else {
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email = htmlspecialchars($email, ENT_QUOTES,'UTF-8');
        } else { 
            echo "Email harus sesuai format";            
        }
    }
}
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="input">Input : </label>
        <input type="text" name="input" id="input"><br><br>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email"><br><br>

        <span class="error">
            <?php echo $inputErr; echo $emailErr;?>
        </span><br>
        <input type="submit" name="submit" value="Submit">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<p>Data yang diinputkan : $input<br>Email yang diinputkan : $email</p>";
}
?>
</body>
</html>
