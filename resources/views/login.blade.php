<!DOCTYPE HTML>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
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
                
                <div class="auth__form auth__inner__section">
                    <div class="form">
                        <form method="post" action="/login">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h1 class="form__title">Welcome back</h1>
                            <label class="form__label"><span class="form__label__text">Email</span>
                                <input type="email" name="email" class="form__input" required>
                                <div class="form__input-border"></div>
                            </label>
                            <label class="form__label"><span class="form__label__text">Password</span>
                                <input type="password" name="password" class="form__input" required>
                                <div class="form__input-border"></div>
                            </label>
                            <button type='submit' class="button">Login</button>

                        </form>
                        
                        <button class="button" onclick="redirectRegister();" >Register</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>

<script type="text/javascript" src="assets/js/login.js"></script>

</body>

</html>
