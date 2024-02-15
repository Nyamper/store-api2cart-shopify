<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-sm d-flex flex-wrap justify-content-evenly">
        <?php foreach ($products as $key => $value) : ?>
            <div class="card m-3" style="width: 18rem;">
                <img src=<?= $value->images[0]->http_path ?> class="card-img-top" alt="...">
                <div class="card-body text-primary text-opacity-75">
                    <h5 class="card-title text-center"><?= $value->name ?></h5>
                    <h6 class="text-center">Price: <span class="badge bg-success">$<?= $value->price ?></span></h6>
                    <p class="card-text text-center">Last Modified: <?= explode('T', $value->modified_at->value)[0] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


</body>

</html>