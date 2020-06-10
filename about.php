<!DOCTYPE html>
<html lang="en">

<head>
    <title>BoRe</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="./images/favicon_browser.png" />
    <link rel="stylesheet" type="text/css" href="assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="assets/css/footer.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/popUps.css">
    <link rel="stylesheet" type="text/css" href="assets/css/about-body.css">
    <script src="assets/js/loadingScreen.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/loadingScreen.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="fonts/fontsDropdown/css/fontawesome.css" rel="stylesheet">
    <link href="fonts/fontsDropdown/css/brands.css" rel="stylesheet">
    <link href="fonts/fontsDropdown/css/solid.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>

    </style>
</head>

<body class="body">

    <div class="header">

        <?php
        include('header.html');
        ?>

    </div>

    <main class="content">

        <?php
        include('body-about.html');
        ?>

    </main>

    <footer class="mainFooter ">
        <?php
        include('footer.php');
        ?>
    </footer>

    <?php
    include('popUps.php');
    ?>




</body>

</html>