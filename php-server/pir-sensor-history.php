<?php

const HISTORY_FILE = '/tmp/cam-pir-history.txt';

if (isset($_GET['rm'])) {
        unlink(HISTORY_FILE);
        header("Location: ".$_SERVER['SCRIPT_NAME']);
}

$file = file(HISTORY_FILE);
$data = array_reverse($file);

$list = array_map(function ($item) {
        $datas = json_decode($item, true);
        return '['.date('d/m/Y H:i:s', $datas['time']).'] <strong>'.$datas['message'].'</strong>';
}, $data);

$html = '';
foreach ($list as $item) {
        $html .= $item."<br />";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLP$

    <title>PIR History</title>
  </head>
  <body>
    <h1>PIR History</h1>
     <?php echo $html ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin$
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="a$
  </body>
</html>
