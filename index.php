<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caesar Cipher</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="card bg-light mt-5 w-50 mx-auto">
            <h5 class="card-header text-center">Caesar Cipher Program </h5>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group row">
                        <label for="text" class="col-sm-2 col-form-label">Text</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="text" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $text = isset($_POST['text']) ? $_POST['text'] : '';

    function Cipher($ch, $key)
    {
        if (!ctype_alpha($ch))
            return $ch;

        $offset = ord(ctype_upper($ch) ? 'A' : 'a');
        return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
    }

    function Encipher($input, $key)
    {
        $output = "";

        $inputArr = str_split($input);
        foreach ($inputArr as $ch)
            $output .= Cipher($ch, $key);

        return $output;
    }

    function Decipher($input, $key)
    {
        return Encipher($input, 26 - $key);
    }

    $cipherText = Encipher($text, 5);
    $plainText = Decipher($cipherText, 5);

    echo '
        <div class="container mt-5">
            <table class="table table-bordered table-striped table-dark w-50 mx-auto">
                <tr>
                    <th colspan="2" class="text-center">Output</th>
                </tr>
                <tr>
                    <td>Plain Text</td>
                    <td>' . $text . '</td>
                </tr>
                <tr>
                    <td>Cipher Text</td>
                    <td>' . $cipherText . '</td>
                </tr>
                <tr>
                    <td>Decryption</td>
                    <td>' . $plainText . '</td>
                </tr>
            </table>
        </div>
    ';
}
?>