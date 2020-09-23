<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style_userAccountCreation.css"/>
        <title>AccountCreation</title>
    </head>

    <body>
        <form method="post" action="../controllers/AddUserController.php">

            <p>
                <label for="firstname">Firstame :</label>
                <input type="text" name="firstname" pattern="[a-zA-Z]+-?[a-zA-Z]+" placeholder="Firstname" id="firstname" required/>

                <label for="lastname">Lastname :</label>
                <input type="text" name="lastname" pattern="[a-zA-Z]+-?[a-zA-Z]+" placeholder="Lastname" id="lastname" required/>

                <label for="date">Birthdate :</label>
                <input type="date" name="date" placeholder="Date" id="date" required/>

                <p>Gender :</p>
                <div>
                    <label for="man">Man</label>
                    <input type="radio" id="man" name="gender" value="man" checked/>
                </div>
                  
                <div>
                    <label for="woman">Woman</label>
                    <input type="radio" id="woman" name="gender" value="woman">
                </div>

                <label for="height">Height (cm):</label>
                <input type="number" name="height" id="height" min="100" max="250" value="100" required/>

                <label for="weight">Weight (kg):</label>
                <input type="number" name="weight" id="weight" min="30" max="250" value="30" required/>

                <label for="email">Email :</label>
                <input type="email" name="email" placeholder="Email" id="email" required/>

                <label for="password">Password :</label>
                <input type="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" id="password" required/>

                <label for="password_">Confirm Password :</label>
                <input type="password" name="_confirm" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" id="password_confirm" required/>
                <!-- Regex : 8 chars, 1 uppercase letter, one lowercaser letter, one number, one special char-->

                <input type="submit" value="Envoyer"/>
            </p>

        </form>
    </body>

</html>