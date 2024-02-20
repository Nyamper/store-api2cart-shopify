<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $prevPageHash = $_SESSION['previousPageHash'];
    $nextPageHash = $_SESSION['nextPageHash'];
    ?>
    <div class="d-flex justify-content-center">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item"><a class="page-link <?php echo ($prevPageHash ?: 'disabled') ?>" href="/?filter=previous">Previous</a></li>
                <li class="page-item"><a class="page-link <?php echo ($nextPageHash ?: 'disabled') ?>" href="/?filter=next">Next</a></li>
            </ul>
        </nav>
    </div>
</body>

</html>