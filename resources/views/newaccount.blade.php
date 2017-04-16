<!DOCTYPE HTML>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/register.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <link rel="icon" href="images/tab_icon.jpg" sizes="16x16">
</head>

<body>
    <!-- A recreation of the Discord login form  https://discordapp.com/login -->
    <div class="auth-wrap-background">
        <div class="auth-center">
            <div class="auth-blur auth-size">
                <div class="auth-wrap-background"></div>
            </div>
        </div>
        <div class="auth-center">
            <div class="auth__inner auth-size">
                <div class="auth__sidebar auth__inner__section"></div>
                <div class="auth__form auth__inner__section">
                    <div class="form">
                        <form method="post" action="/register">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           <!--  <h1 class="form__title">Welcome back</h1> -->
                            <label class="form__label"><span class="form__label__text">First Name</span>
                                <input type="text" name="name" class="form__input" required>
                                <div class="form__input-border"></div>
                            </label>
                            <label class="form__label"><span class="form__label__text">Last Name</span>
                                <input type="text" name="surname" class="form__input" required>
                                <div class="form__input-border"></div>
                            </label>
                            <label class="form__label"><span class="form__label__text">Email</span>
                                <input type="email" name="email" class="form__input" required>
                                <div class="form__input-border"></div>
                            </label>
                            <label class="form__label"><span class="form__label__text">Password</span>
                                <input type="password" name="password" class="form__input" required>
                                <div class="form__input-border"></div>
                            </label>
                            <button type='submit' class="button">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>
</body>

</html>
<!-- 
<div class="container">
    <div class="form-group">
        <form method="post" action="/register">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="name" class="form-control" required>
            <input type="text" name="surname" class="form-control" required>
            <input type="email" name="email" class="form-control" required>
            <input type="password" name="password" class="form-control" required>
            <button type='submit' class="btn btn-primary">SUBMIT</button>
        </form>
    </div>
</div>
 -->