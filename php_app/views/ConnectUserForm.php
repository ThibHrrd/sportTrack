<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="ressources/css/style.css"/>
        <title>Login</title>
    </head>

    <body>
        <form method="post" action="/m3104_13/index.php?page=user_connect">

            <h1>
                Welcome to SportTrack ! Please sign in or register !
            </h1>


            <p>
                <label for="email">Email :</label>
                <input type="email" name="email" placeholder="Email" id="email" required/>
            </p>
            <p>
                <label for="password">Password :</label>
                <input type="password" name="password" pattern="[^\]" placeholder="Password" id="password" maxlength="15" required/>
            </p>
            <p>
            <input type="submit" value="Submit" />
            <input type=button onclick="document.location.href='/m3104_13/index.php?page=user_add_form'"; value="Register"/>
            </p>

        </form>
    </body>

</html>
