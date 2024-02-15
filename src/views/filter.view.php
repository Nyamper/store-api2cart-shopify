<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    $host = $_SERVER["HTTP_HOST"];
    ?>
    <div class="d-flex justify-content-center">
        <a href="<?php $host ?>/?filter=all" class="btn btn-outline-primary m-3">ALL</a>
        <a href="<?php $host ?>/?filter=today" class="btn btn-outline-primary m-3">Today</a>
        <a href="<?php $host ?>/?filter=yesterday" class="btn btn-outline-primary m-3">Yesterday</a>
    </div>
</body>

</html>