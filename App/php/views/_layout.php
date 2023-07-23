<?php
$pathInfo = $_SERVER['PATH_INFO'] ?? '';
$path = $pathInfo ? (strlen($pathInfo) > 9 ? './../../' : './') : './';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="<?php echo $path?>Css/main.css">
    <link rel="stylesheet" href="<?php echo $path?>Css/normalize.css">
    <link rel="stylesheet" href="<?php echo $path?>Css/productsStyle.css">
    <link rel="stylesheet" href="<?php echo $path?>Css/button.css">
    <link rel="stylesheet" href="<?php echo $path?>Css/table.css">
    <link rel="stylesheet" href="<?php echo $path?>Css/form.css">
</head>
<body>
    <?php echo $content; ?>
</body>
</html>