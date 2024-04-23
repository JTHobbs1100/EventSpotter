<!-- HOSTED AT https://cs4640.cs.virginia.edu/fdu5ff/EventSpotter/ -->

<!DOCTYPE html>

<!-- Sources
https://getbootstrap.com/docs/4.0/components/navbar/
-->

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

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/main.css">
    <script src="https://cdn.jsdelivr.net/npm/less"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>




<body>



    <header>
        <?php include("{$GLOBALS["URL"]}/templates/navbar.php"); ?>
    </header>
    <div class="front-page">
        <div class="headline">
            <h1 class="pretty">Welcome to...</h1>
            <h1 class="splash"> <a style="text-decoration: none;" class="splash" href="?command=homepage">Event
                    Spotter</a></h1>
            <p class="slogan">find local shows, open mics, arts events, and more!</p>
            <p class="founders"></p>
        </div>

        <div class="featured-events">
            <h1 class="page-title">
                <a class="page-title" href="?command=events" style="text-decoration: none;"> featured events</a>
            </h1>
            <div class="featured-events-list">
                <?php foreach ($_SESSION["featuredEvents"] as $event) { ?>
                    <div class="event">
                        <h2><a style="text-decoration: none;" class="eventSub" href="?command=events"><?= $event["event_name"] ?></a></h2>
                        <p class="description"><?= $event["event_description"] ?>
                        </p>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>


    <script>
        // $(document).ready(function() {

        //dom manipulation
        $(".eventSub").hover(
            function() {
                let ogColor = $(this).css('color');
                $(this).data('ogColor', $(this).css('color'));
                $(this).css("color", "gold");
            },
            function() {
                $(this).css("color", $(this).data('ogColor'));
            }
        );

        $(".splash").hover(
            function() {
                let ogColor = $(this).css('color');
                $(this).data('ogColor', $(this).css('color'));
                $(this).css("color", "gold");
                $(".founders").html("Founded by Maseel Shah and Jacob Hobbs");
                $(".founders").css("color", "gold");

                $(".pretty").data('ogColor', $(this).css('color'));
                $(".pretty").css("color", "gold");
            },
            function() {
                $(this).css("color", $(this).data('ogColor'));
                $(".pretty").css("color", $(this).data('ogColor'));
                $(".founders").html("");
            }
        );

        $(".page-title").hover(
            function() {
                let ogColor = $(this).css('color');
                $(this).data('ogColor', $(this).css('color'));
                $(this).css("color", "gold");
            },
            function() {
                $(this).css("color", $(this).data('ogColor'));
            }
        );

        $(".pretty").hover(
            function() {
                let ogColor = $(this).css('color');
                $(this).data('ogColor', $(this).css('color'));
                $(this).css("color", "gold");

                $(".founders").html("Founded by Maseel Shah and Jacob Hobbs");
                $(".founders").css("color", "gold");

                $(".splash").data('ogColor', $(this).css('color'));
                $(".splash").css("color", "gold");
            },
            function() {
                $(this).css("color", $(this).data('ogColor'));
                $(".splash").css("color", $(this).data('ogColor'));
                $(".founders").html("");

            }
        );
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>