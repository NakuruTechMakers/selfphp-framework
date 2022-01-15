<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="origin">

    <title><?= $_ENV['APP_NAME'] ?></title>

    <link href="<?= $_ENV['APP_DOMAIN'] ?>/public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- font-awesome icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6a9db0427a.js" crossorigin="anonymous"></script>

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
</head>

<body class="bodyContainer">
    <!-- Topbar -->
    <div class="pb-5">
        <?php
        include $this->RootDir . "/resources/partials/topbar.php";
        ?>
    </div>
    <!--end of topbar -->

    <!-- body -->
    <div style="margin-top: 90px;" class="card border-0 pt-3 pb-5">
        <div class="card-body">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="form-group pl-5">
                        <a href="login"><button class="btn btn btn-primary">Sign In</button></a>
                    </div>
                    <div class="form-group pl-5">
                        <a href="register"><button class="btn btn btn-primary">Sign Up</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /body -->

    <!-- footer -->
    <?php
    include $this->RootDir . "/resources/partials/footer.php";
    ?>
    <!-- /footer -->