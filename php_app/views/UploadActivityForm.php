<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="ressources/css/style.css"/>
        <title>Upload activity data</title>
    </head>

    <body>
        <form method="post" action="/m3104_13/index.php?page=upload_activity" enctype="multipart/form-data">

            <p>
                <label for="avatar">Choose a JSON sport file : </label>
                <input type="file" id="fileToUpload" name="fileToUpload" accept=".json" required>

                <input type="submit" value="Validate" />

            </p>

            <p>
            <input type=button onclick="document.location.href='/m3104_13/index.php?page=list_activities'"; value="Back to Dashboard"/>
            </p>

        </form>
    </body>

</html>
