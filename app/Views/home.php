<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $data['pageTag']; ?></title>
</head>
<body>


<?php  formatData($data)?>


<?php echo baseUrl() . '<br>';
 echo passGenerator(20) . '<br>';
 echo token() . '<br>';
 echo SMONEY.formatCurrency(222232);
 ?>

</body>
</html>