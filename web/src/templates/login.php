<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author"
        content="Maseel Shah (dda5us)[Worked on HTML formatting & general page setup] and Jacob Hobbs (fdu5ff)[worked on CSS styling and HTML formatting]">
    <meta name="description" content="Home Page for Event Spotter Website">
    <meta name="keywords" content="Event Spotter, event, spotter, virginia, uva events, uva, 
        uva event spotter, maseel, jacob, shah, hobbs, maseel shah, jacob hobbs,
        local events, music, theatre, local music, indie, poetry, arts">

    <!-- title of page -->
    <meta property="og:title" content="Homepage">
    <meta property="og:type" content="website">

    <!-- Need to figure this out later  -->
    <!-- <meta property="og:image" content="https://cs4640.cs.virginia.edu/> -->
    <!-- <meta property="og:url" content="https://cs4640.cs.virginia.edu/"> -->
    <meta property="og:description"
        content="This website will display arts related events happening in the local area.">
    <!-- title of site -->
    <meta property="og:site_name" content="Event Spotter">

    <title>Event Spotter</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/main.css">
</head>




<body>
    <header>
        <?php include("/opt/src/templates/navbar.php"); ?>
    </header>

    <div class="basic-page">
        <div class="basic-container">
            <h1 class="page-title">log in</h1> <br>
            <form class="login-form" action="?command=authentication" method="post">
                <h2 class="field-label-text">username:</h2>
                <input type="text" class="login-field" name="username" id="user" aria-label="Username" required> <br>
                <h2 class="field-label-text">password:</h2>
                <input type="password" class="login-field" name="password" id="pass" aria-label="Password" required>
                <br>
                <!-- add if statement for session to see if logged in so we can make it a log out button instead -->
                <button class=" field-submit-btn" type="submit">log in</button>


            </form>
            <a href="?command=create_account_page"><button class="field-submit-btn">create account</button> </a>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12" style="text-align:center;">
                <?= $loginMessage ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>