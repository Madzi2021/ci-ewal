<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eWal</title>

    <!-- My Syles (Sidebar) -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <!-- Bootstrap 5.1 -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="/res/iconfont/material-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>

    <?= $this->include('template/sidebar'); ?>

    <?= $this->renderSection('content'); ?>

    <!-- Bootstrap -->
    <script src="/js/bootstrap.bundle.min.js"></script>

    <!-- My Script (Sidebar) -->
    <script src="/js/script.js"></script>

</body>

</html>