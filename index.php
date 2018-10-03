<?php
require 'logic.php';
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <!-- Bootstrap CSS -->
    <link rel='stylesheet'
          href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
          integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO'
          crossorigin='anonymous'>
    <link rel='stylesheet' href='styles/main.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>

    <title>Length Converter</title>
</head>

<body>
<div class='container'>
    <div class='row mt-4'>
        <div class='col-md-8 col-centered'>
            <div class='card'>
                <h2 class='col-centered'>Length Converter</h2>
            </div>
        </div>
    </div>
    <div class='row mt-2'>
        <div class='col-md-8 col-centered'>
            <div class='card'>
                <div class='card-body'>
                    <form method='POST' action='process.php'>
                        <br>
                        <div class='form-row'>
                            <div class='col'>
                                <label>From</label>
                                <select name='from' class='form-control'>
                                    <?php foreach ($Units as $Unit): ?>
                                        <option <?php if (isset($from) && $from == $Unit) echo 'selected' ?>><?= $Unit ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class='col'>
                                <label>To</label>
                                <select name='to' class='form-control'>
                                    <?php foreach ($Units as $Unit): ?>
                                        <option <?php if (isset($to) && $to == $Unit) echo 'selected' ?>><?= $Unit ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <input class='form-control'
                               type='text'
                               name='value'
                               value='<?php echo (isset($val)) ? $val : '' ?>'
                               placeholder='Value to convert'>
                        <br>
                        <label><input type='checkbox'
                                      name='roundUp' <?php if ($roundUp == 'on') echo 'checked' ?> > Round up</label>
                        <br>
                        <br>
                        <button type='submit' class='btn btn-light'>Convert</button>
                        <button name='clear' class='btn btn-dark'>Clear</button>
                    </form>
                    <br>
                    <?php if ($hasErrors): ?>
                        <div class='errors alert alert-danger'>
                            <?php foreach ($errors as $error): ?>
                                <?= $error ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif ?>
                    <?php if (!$hasErrors && $alert == 1): ?>
                        <div class='alert alert-success' role='alert'>
                            <?php echo 'Result: ' . $val . ' ' . $from . ' = ' .
                                $result . ' ' . $to ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>