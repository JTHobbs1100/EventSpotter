<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author"
        content="Maseel Shah (dda5us)[Worked on HTML formatting & general page setup] and Jacob Hobbs (fdu5ff)[worked on CSS styling and HTML formatting]">
    <meta name="description" content="Event details page for Event Spotter">
    <meta name="keywords" content="Event Spotter, event, spotter, virginia, uva events, uva, 
        uva event spotter, maseel, jacob, shah, hobbs, maseel shah, jacob hobbs,
        local events, music, theatre, local music, indie, poetry, arts">

    <!-- title of page -->
    <meta property="og:title" content="Event Details Page">
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
        <div class="basic-container event-details-page-container">
            <h1 class="page-title">Example Event Title</h1> <br>
            <div class="event-details-container">
                <div class="event-details">
                    <h2>When?</h2>
                    <p class="description">February 29th from 8-10pm</p>
                    <h2>Where?</h2>
                    <p class="description">@ 123 Apple Street, Charlottesville VA</p>
                    <h2>What?</h2>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Lectus arcu bibendum at varius vel pharetra
                        vel turpis. Purus non enim praesent elementum facilisis leo. Aliquam sem fringilla ut morbi
                        tincidunt augue interdum. Dignissim enim sit amet venenatis. Adipiscing elit duis tristique
                        sollicitudin nibh sit amet commodo. Eget est lorem ipsum dolor sit amet consectetur. Ultrices
                        gravida dictum fusce ut placerat orci. </p>
                    <h2>How?</h2>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Lectus arcu bibendum at varius vel pharetra
                        vel turpis. Purus non enim praesent elementum facilisis leo. Aliquam sem fringilla ut morbi
                        tincidunt augue interdum. </p>



                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>