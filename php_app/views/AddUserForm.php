<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="ressources/css/style.css"/>
        <title>AccountCreation</title>
    </head>

    <body>

        <h1>
            Welcome to registration ! If you already have an account, juste click "Sign in" !
        </h1>
        <form method="post" action="/m3104_13/index.php?page=user_add">

            <p>
                <label for="firstname">Firstame :</label>
                <input type="text" name="firstname" pattern="[a-zA-Z]+-?[a-zA-Z]+" placeholder="Firstname" id="firstname" required/>
            </p>
            <p>
                <label for="lastname">Lastname :</label>
                <input type="text" name="lastname" pattern="[a-zA-Z]+-?[a-zA-Z]+" placeholder="Lastname" id="lastname" required/>
            </p>
            <p>
                <label for="date">Birthdate :</label>
                <input type="date" name="date" placeholder="Date" id="date" required/>
            </p>
            <p>
                <p>Gender :</p>
                <div>
                    <label for="man">Man</label>
                    <input type="radio" id="man" name="gender" value="man" checked/>
                </div>
                  
                <div>
                    <label for="woman">Woman</label>
                    <input type="radio" id="woman" name="gender" value="woman">
                </div>
            </p>
            <p>
                <label for="height">Height (cm):</label>
                <input type="number" name="height" id="height" min="100" max="250" value="100" required/>
            </p>
            <p>
                <label for="weight">Weight (kg):</label>
                <input type="number" name="weight" id="weight" min="30" max="250" value="30" required/>
            </p>
            <p>
                <label for="email">Email :</label>
                <input type="email" name="email" placeholder="Email" id="email" required/>
            </p>
            <p>
                <label for="password">Password :</label>
                <input type="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" id="password" required/>
            </p>
            <p>
                <label for="password_">Confirm Password :</label>
                <input type="password" name="_confirm" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" id="password_confirm" required/>
                <!-- Regex : 8 chars, 1 uppercase letter, one lowercaser letter, one number, one special char-->
            </p>
            <p>
                <input type="submit" value="Envoyer"/>
                <input type=button onclick="document.location.href='/m3104_13/index.php?page=user_connect'"; value="Sign in"/>
            </p>

        </form>
    </body>

</html>