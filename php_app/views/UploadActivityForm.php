<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style.css"/>
        <title>Upload activity data</title>
    </head>

    <body>
        <form method="post" action="/m3104_13/index.php?page=upload_activity" enctype="multipart/form-data">

            <p>
                <label for="avatar">Choose a JSON sport file : </label>
                <input type="file" id="fileToUpload" name="fileToUpload" accept=".json" required>

                <input type="submit" value="Envoyer" />

            </p>

        </form>
    </body>

</html>
