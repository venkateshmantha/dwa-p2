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

    <title>Unit Converter</title>
</head>

<body>
<div class='container'>
    <div class='row mt-4'>
        <div class='col-md-8 col-centered'>
            <div class='card'>
                <h1 class='col-centered'>Unit Converter</h1>
            </div>
        </div>
    </div>
    <div class='row mt-2'>
        <div class='col-md-8 col-centered'>
            <div class='card'>
                <div class='card-body'>
                    <!-- Nav tabs -->
                    <ul class='nav nav-tabs'>
                        <li class='nav-item'>
                            <a class='nav-link active' data-toggle='tab' href='#Length'>Length</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' data-toggle='tab' href='#Temperature'>Temperature</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' data-toggle='tab' href='#Weight'>Weight</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' data-toggle='tab' href='#Time'>Time</a>
                        </li>
                    </ul>

                    <!-- Active tab pane -->
                    <div class='tab-content'>

                        <div class='tab-pane container active' id='Length'>
                            <form method='POST' action='process.php'>
                                <br>
                                <div class='form-row'>
                                    <div class='col'>
                                        <label>From</label>
                                        <select name='from' class='form-control'>
                                            <?php foreach ($Length as $Val): ?>
                                                <option><?= $Val ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class='col'>
                                        <label>To</label>
                                        <select name='to' class='form-control'>
                                            <?php foreach ($Length as $Val): ?>
                                                <option><?= $Val ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <input class='form-control'
                                       type='text'
                                       name='value'
                                       value='<?= $val ?? '' ?>'
                                       placeholder='Value to convert'>
                                <br>
                                <label><input type='checkbox'
                                                            name='roundUp' <?php if ($roundUp == 'on') echo 'checked' ?> >Round up</label>
                                <br>
                                <br>
                                <button type='submit' class='btn btn-primary'>Convert</button>
                                <button name='clear' class='btn btn-primary'>Clear</button>
                            </form>
                            <br>
                            <?php if ($hasErrors): ?>
                                <div class='errors alert alert-danger'>
                                    <ul>
                                        <?php foreach ($errors as $error): ?>
                                            <li><?= $error ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif ?>
                            <?php if (!$hasErrors && $session != null): ?>
                                <div class='alert alert-primary' role='alert'>
                                    <?php echo 'Result: ' . $val . ' ' . $from . ' = ' .
                                        $result . ' ' . $to ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Other tab panes -->
                        <?php foreach ($Units as $Unit => $Item): ?>
                            <div class='tab-pane container fade' id='<?= $Unit ?>'>
                                <form method='POST' action='process.php'>
                                    <br>
                                    <div class='form-row'>
                                        <div class='col'>
                                            <label>From</label>
                                            <select name='from' class='form-control'>
                                                <?php foreach ($Item as $Val): ?>
                                                    <option><?= $Val ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class='col'>
                                            <label>To</label>
                                            <select name='to' class='form-control'>
                                                <?php foreach ($Item as $Val): ?>
                                                    <option><?= $Val ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <input class='form-control'
                                           type='text'
                                           name='value'
                                           value='<?= $val ?? '' ?>'
                                           placeholder='Value to convert'>
                                    <br>
                                    <label class='radio'><input type='checkbox'
                                                                name='roundUp'>Round up</label>
                                    <br>
                                    <br>
                                    <button type='submit' class='btn btn-primary'>Convert</button>
                                    <button name='clear' class='btn btn-primary'>Clear</button>
                                </form>
                                <br>
                                <?php if ($hasErrors): ?>
                                    <div class='errors alert alert-danger'>
                                        <ul>
                                            <?php foreach ($errors as $error): ?>
                                                <li><?= $error ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif ?>
                                <?php if (!$hasErrors && $session != null): ?>
                                    <div class='alert alert-primary' role='alert'>
                                        <?php echo 'Result: ' . $val . ' ' . $from . ' = ' .
                                            $result . ' ' . $to ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>