<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    
        <link rel="stylesheet" href="{{ mix('css/login.css') }}">
    
        <!-- link script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <title>Document</title>
    </head>
    <body>
        <div class="form-structor">
            <form action="/signUp" method="post">
                <div class="signup">
                    <h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
                    <div style="color: firebrick; text-align: center">{{isset($error) ? $error : ""}}</div>
                    <div class="form-holder">
                        @csrf
                        <input type="text" class="input" name="name" placeholder="Name" />
                        <input type="email" class="input" name="email" placeholder="Email" />
                        <input type="password" class="input" name="password" placeholder="Password" />
                    </div>
                    <button type="submit" class="submit-btn">Sign up</button>
                </div>
            </form>
            <form action="/login" method="post">
            <div class="login slide-up">
                <div class="center">
                    <h2 class="form-title" id="login"><span>or</span>Log in</h2>
                    <div style="color: firebrick; text-align: center">{{isset($error) ? $error : ""}}</div>
                    <div class="form-holder">
                        @csrf
                        <input type="email" class="input" name="email" placeholder="Email" />
                        <input type="password" class="input" name="password" placeholder="Password" />
                    </div>
                    <button type="submit" class="submit-btn">Log in</button>
                </div>
            </div>
            </form>
        </div>
        <script src="{{ mix('js/login.js') }}"></script>
    </body>
</html>
