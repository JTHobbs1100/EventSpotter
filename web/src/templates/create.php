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
            <h1 class="page-title"><a class="page-title2" href="?command=create" style="text-decoration:none;">Create an Event</a></h1> <br>
            <form class="form" action="?command=submit_event" method="post">
                <h2 class="field-label-text">Event Name:</h2>
                <input type="text" class="form-field-large" name="event_name" id="eventName" aria-label="Event Name" required>
                <br>
                <h2 class="field-label-text">Event Description:</h2>
                <textarea class="form-field-para" name="event_description" id="eventDescription" aria-label="Event Description" required> </textarea>
                <h2 class="field-label-text">Event Date:</h2>
                <input type="date" class="form-field-date" name=event_date id="eventDate" aria-label="Event Date" required><br>
                <h2 class="field-label-text">Event Time:</h2>
                <input type="time" class="form-field-time" name="start_time" id="startTime" aria-label="Event Start Time" required>
                <span class="field-label-text">-</span>
                <input type="time" class="form-field-time" name="end_time" id="endTime" aria-label="Event End Time" required><br>
                <h2 class="field-label-text">Event Location:</h2>
                <input type="text" class="form-field-reg" name="event_location" id="location" aria-label="Event Location" required><br>
                <button class="field-submit-btn" type="submit">Create Event!</button>
            </form>
        </div>
    </div>

    <script>
        document.querySelector('.field-submit-btn').addEventListener('mouseenter', function() {
            this.style.color = 'gold';
        });

        document.querySelector('.field-submit-btn').addEventListener('mouseleave', function() {
            this.style.color = 'white';
        });


        const createHeader = document.querySelector('.page-title2');

        //using arrow function
        createHeader.addEventListener('mouseenter', () => {
            createHeader.style.color = 'gold'; 
        });

        createHeader.addEventListener('mouseleave', () => {
            createHeader.style.color = 'white'; 
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>



</body>

</html>