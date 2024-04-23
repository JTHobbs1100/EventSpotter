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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <script>
        var currentPage = -1;
        var numEvents = -1;
        var MAX_EVENTS_PER_PAGE = 5;
        var prettyEvents = [];
    function init() {

        // console.log("loaded");
        // if (localStorage.getItem("board") == false || localStorage.getItem("board") == null) {
        //     setUpNewGame();
        //     //console.log("Loaded from local storage");
        // } else {
        //     let cat = JSON.parse(localStorage.getItem("json"));
        //     //console.log("cat",cat);
        //     createTable(cat);
        //     stats();
        //     showHistory();
        // }

        request = $.ajax({
            url: "../requestHandler.php",
            type: "post",
            data: {
                eventPage: 0
            }
        });

        request.done(function(response) {
            // console.log(response);
            let allEvents = JSON.parse(response);
            // console.log(allEvents.toString());
            allEvents.forEach((eventObj) => {
                // console.log(eventObj)
                prettyEvents.push(`
                    <div class="event-item">
                        <div class="event">
                            <h2> ${eventObj["event_name"]} </h2>
                            <p class="location">@ ${eventObj["event_location"]} </p>
                            <p class="description"> ${eventObj["event_date"]} from ${eventObj["start_time"]} to ${eventObj["end_time"]}</p>
                            <p class="description"> ${eventObj["event_description"]}
                            </p>
                            <p class="postedBy">posted by ${eventObj["username"]}</p>
                        </div>
                    </div>
                    `)
                })
            // prettyEvents.forEach((prettyEvent) => {
            //     $("#eventsContainer").append(prettyEvent);
            // })
    
            //$("#eventsContainer").append()
            currentPage = 0;
            numEvents = prettyEvents.length;
            if(numEvents>MAX_EVENTS_PER_PAGE){
                $("#nextEvents").removeAttr('disabled');
            }
            if(currentPage < 0){
                console.error("Bad Page Load")
            }
            showCurrentPage();
        });

        request.fail(function(jqXHR, textStatus, errorThrown) {
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });

        


    }

    window.addEventListener("load", init);

    // currentPage.addEventListener("change", showCurrentPage)

    function showCurrentPage() {
        $("#eventsContainer").empty();
        for(let i = currentPage*MAX_EVENTS_PER_PAGE; i<= (currentPage+1)*MAX_EVENTS_PER_PAGE - 1 && i<numEvents; i++){
            $("#eventsContainer").append(prettyEvents[i]);
        }
    }

    function nextPage(){
        let isNextPage = ((currentPage + 1) * MAX_EVENTS_PER_PAGE) < numEvents;
        if(isNextPage){
            currentPage++; 
            // console.log("current page: ", currentPage);
            isNextPage = ((currentPage + 1) * MAX_EVENTS_PER_PAGE) < numEvents;
            if(!isNextPage){
                $("#nextEvents").prop("disabled", true);
            }
            let isPrevPage = currentPage>0;
            if(isPrevPage){
                $("#prevEvents").removeAttr('disabled');
            }
            showCurrentPage();
        }else{
            console.log("bad next page call");
        }
    }

    function prevPage(){
        let isPrevPage = currentPage>0;
        if(isPrevPage){
            currentPage--; 
            // console.log("current page: ", currentPage);
            isPrevPage = currentPage>0;
            if(!isPrevPage){
                $("#prevEvents").prop("disabled", true);
            }
            let isNextPage = ((currentPage + 1) * MAX_EVENTS_PER_PAGE) < numEvents;
            if(isNextPage){
                $("#nextEvents").removeAttr('disabled');
            }
            showCurrentPage();
        }else{
            console.log("bad prev page call");
        }
    }


    </script>

    <header>
        <?php include("{$GLOBALS["URL"]}/templates/navbar.php"); ?>
    </header>

    <div class="basic-page">
        <div class="basic-container events-container">
            <h1 class="page-title">Events WIP</h1> <br>
            <div id="eventsContainer">
                <!-- this is where events will go! -->
            </div>
            <div class="row mb-2">
            <div class="col-xs-12">
                <div class="row justify-content-center">
                    <button onClick="prevPage()" class="field-submit-btn mx-1" style="width:auto" id = "prevEvents" disabled> ← prev </button>
                    <button onClick="nextPage()" class="field-submit-btn mx-1" style="width:auto" id = "nextEvents" disabled> next → </button>
                </div>
            </div>
        </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>