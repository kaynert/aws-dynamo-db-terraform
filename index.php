<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" >
    <title>Login Form</title>
</head>

<body>
    <main>
        <div class="outer-box">
            <div class="inner-box">
                <div class="forms-container">
                    <form action="processlogin.php" class="login-form" method="POST">
                        <div class="logo">
                            <img src="img/pear.jpg"  alt="codeigniters">
                            <h4>codeigniters</h4>
                        </div>

                        <div class="title">
                            <h2>Welcome!!</h2>
                        </div>

                        <div class="actual-form">
                            <div class="input-container">
                                <input type="text" class="input-spaces" autcomplete="off" minlength="2" name="username" id="username" placeholder="Username" required>
                                <label for="username"></label>
                            </div>

                            <div class="input-container">
                                <input type="password" class="input-spaces" autcomplete="off" minlength="2" name="password" id="password" placeholder="Password" required>
                                <label for="password"></label>
                            </div>

                            <input class="signin-btn" type="submit" value="Sign In"></button>
                        </div>

                    </form>
                </div>
                <div class="carousel">
                    <div class="image-wrapper">
                        <img src="img/team.jpg" alt="main-image" class="main-image">
                    </div>
                </div>
            </div>
        </div>
    </main>
    



</body>
</html>