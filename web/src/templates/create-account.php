<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Maseel Shah (dda5us)[Worked on HTML formatting & general page setup] and Jacob Hobbs (fdu5ff)[worked on CSS styling and HTML formatting]">
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
    <meta property="og:description" content="This website will display arts related events happening in the local area.">
    <!-- title of site -->
    <meta property="og:site_name" content="Event Spotter">


    <title>Event Spotter</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/main.css">
</head>




<body>
    <header>
        <?php include("{$GLOBALS["URL"]}/templates/navbar.php"); ?>
    </header>

    <div class="basic-page">
        <div class="basic-container">
            <h1 class="page-title"><a class="page-title2" href="?command=create_account_page" style="text-decoration:none;">create account</a></h1> <br>
            <form class="login-form" action="?command=create_account" method="post">
                <h2 class="field-label-text">username:</h2>
                <input type="text" class="login-field" name="username" id="user" aria-label="Username" required>
                <div id="username-msg" class="form-text" style="color:red;"></div>
                <br>
                <h2 class="field-label-text">password:</h2>
                <input type="password" class="login-field" name="password" id="pass" aria-label="Password" required>
                <div class="row">
                    <div class="col-xs-12" style="text-align:center;">
                        <div id="pass-msg" class="form-text" style="color:red;"></div>

                    </div>
                </div>
                <br>
                <!-- add if statement for session to see if logged in so we can make it a log out button instead -->
                <button class="field-submit-btn" type="submit">create account</button>


            </form>
            <a href="?command=login"><button class="field-submit-btn">log in</button> </a>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12" style="text-align:center;">
                <div id="pass-msg" class="form-text" style="color:red;"></div>

                <?= $accountCreationMessage ?>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#user').on('click', function() {
                if ($('#user').val().length < 5) {
                    $('#username-msg').text('Username should be at least 5 characters long');
                }
            });

            $('#user').on('keyup', function() {
                if ($('#user').val().length >= 5) {
                    $('#username-msg').text('');
                }
            });

            $('#pass').on('click', function() {
                if ($('#pass').val().length < 6) {
                    $('#pass-msg').text('Password must be 6-16 characters and contain an upper and lower case letter, and a number!');
                }
            });

            $('#pass').on('keyup', function() {
                if ($('#pass').val().length >= 6) {
                    $('#pass-msg').text('');
                }
            });
        });

        const createHeader = document.querySelector('.page-title2');

        //using arrow function
        createHeader.addEventListener('mouseenter', () => {
            createHeader.style.color = 'gold';
        });

        createHeader.addEventListener('mouseleave', () => {
            createHeader.style.color = 'white';
        });

        $(".field-submit-btn").hover(
            function() {
                let ogColor = $(this).css('color');
                $(this).data('ogColor', $(this).css('color'));
                $(this).css("color", "gold");
            },
            function() {
                $(this).css("color", $(this).data('ogColor'));
            }
        );
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>