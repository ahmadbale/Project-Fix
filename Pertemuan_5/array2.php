<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        table{
            border-collapse: collapse;
            width: 50%;
            margin:auto;
        }

        th,td{
            border: 1px solid black;
            padding : 8px;
            text-align:left;
            
        }
        th{
            background-color: black;
            color:white;
            text-align:center;
        }


    </style>
</head>
<body>
    <table>
    <tr>
        <th>Detail</th>
        <th>Informasi</th>
    </tr>

    <?php
    $Dosen = [
        'nama' => 'Elok Nur Hamdana',
        'domisili' => 'Malang',
        'jenis_kelamin' => 'Perempuan'];
        foreach ($Dosen as $D => $value){
            echo "<tr><td>" .  ucwords(str_replace("_", " ", $D)) . "</td><td>$value</td></tr>";
        }
        ?>
        </table>
</body>
</html>