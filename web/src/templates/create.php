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
  <meta property="og:description" content="This website will display arts related events happening in the local area.">
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
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html">Event Spotter</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
          aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="index.html">home</a></li>
            <li class="nav-item"><a class="nav-link" href="events.html">events</a></li>
            <li class="nav-item"> <a class="nav-link active" href="create.html">create an event</a></li>
            <li class="nav-item"><a class="nav-link" href="login.html">login</a></li>
          </ul>
        </div>
      </div>
    </nav>

  </header>

  <div class="basic-page">
    <div class="basic-container">
      <h1 class="page-title">Create an Event</h1> <br>
      <form class="form">
        <h2 class="field-label-text">Event Name:</h2>
        <input type="text" class="form-field-large" id="eventName" aria-label="Event Name"> <br>
        <h2 class="field-label-text">Event Description:</h2>
        <textarea class="form-field-para" id="eventDescription" aria-label="Event Description"> </textarea>
        <h2 class="field-label-text">Event Date:</h2>
        <input type="date" class="form-field-date" id="eventDate" aria-label="Event Date"><br>
        <h2 class="field-label-text">Event Time:</h2>
        <input type="time" class="form-field-time" id="startTime" aria-label="Event Start Time">
        <span class="field-label-text">-</span>
        <input type="time" class="form-field-time" id="endTime" aria-label="Event End Time"><br>
        <h2 class="field-label-text">Event Location:</h2>
        <input type="text" class="form-field-reg" id="location" aria-label="Event Location"><br>
        <button class="field-submit-btn" type="submit">Create Event!</button>
      </form>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>