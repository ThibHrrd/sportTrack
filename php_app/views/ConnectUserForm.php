<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style.css"/>
        <title>Login</title>
    </head>

    <body>
        <form method="post" action="/m3104_13/index.php?page=user_connect">

            <p>
                <label for="email">Email :</label>
                <input type="email" name="email" placeholder="Email" id="email" required/>

                <label for="password">Password :</label>
                <input type="password" name="password" pattern="[^\]" placeholder="Password" id="password" maxlength="15" required/>


                <input type="submit" value="Submit" />

            </p>

        </form>
    </body>

</html>
