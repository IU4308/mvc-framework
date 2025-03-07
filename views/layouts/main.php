<?php

use app\core\Application;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $this->title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {
            height: 1500px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 1000px) {
            .sidenav {
                height: unset;
            }
        }

        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <h4>Navbar</h4>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/contact">Contacts</a></li>
                    <?php if (Application::isGuest()): ?>
                        <li><a href="/login">Logins</a></li>
                        <li><a href="/register">Registers</a></li>
                    <?php else: ?>
                        <li>
                            <a href="/profile">Profile</a>
                        </li>
                        <li>
                            <a href="/logout">Welcome <?php echo Application::$app->user->getDisplayName() ?>
                                (Logout)
                            </a>
                        </li>
                    <?php endif; ?>
                </ul><br>
            </div>

            <div class="col-sm-9">
                <div class="container">
                    <?php if (Application::$app->session->getFlash('success')): ?>
                        <div class="alert alert-success">
                            <?php echo Application::$app->session->getFlash('success');  ?>
                        </div>
                    <?php endif; ?>
                    {(content)}

                </div>
            </div>
        </div>
    </div>


</body>

</html>