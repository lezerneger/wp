<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
        body {
            background-color: orangered ;
        }

        .btn {
            margin-top: 15px;
        }

        .wrapper {
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .form-signin {
            max-width: 380px;
            padding: 15px 35px 45px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid rgba(0,0,0,0.1);

        .form-signin-heading,
        .checkbox {
            margin-bottom: 30px;
        }

        .form-control {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
        @include box-sizing(border-box);

        &:focus {
             z-index: 2;
         }
        }

        input[type="text"] {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        input[type="password"] {
            margin-bottom: 20px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        }
    </style>

</head>
<body>
    <div class="wrapper">
        <form class="form-signin" action="login.php" method="post">
            <?php if(isset($_GET['l'])): ?>
                <div class="alert alert-danger">
                    <?php
                    // WRONG EMAIL/PASS
                    if($_GET['l'] == 1) {
                        echo '<strong>Error!</strong> Wrong user and/or pass.';
                    } elseif ($_GET['l'] == 2) {
                        echo '<strong>Error!</strong> You are not logged in!';
                    }
                    ?>
                </div>
            <?php endif; ?>

            <?php if(isset($_GET['s'])): ?>
                <div class="alert alert-success">
                    <?php
                    // WRONG EMAIL/PASS
                    if($_GET['s'] == 1) {
                        echo '<strong>Success!</strong> ou are logged out!';
                    }
                    ?>
                </div>
            <?php endif; ?>
            <h2 class="form-signin-heading">Admin Login</h2>
            <input type="text" class="form-control" name="user" placeholder="Username" required="" autofocus="" />
            <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>

    </div>
</body>
</html>