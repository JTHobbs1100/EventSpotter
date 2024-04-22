<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="?command=homepage">Event Spotter</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>

        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link <?php if($_SESSION["activePage"] == "homepage") echo "active"?>"
                        href="?command=homepage">home</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SESSION["activePage"] == "events") echo "active"?>"
                        href="?command=events">events</a></li>
                <li class="nav-item"> <a class="nav-link <?php if($_SESSION["activePage"] == "create") echo "active"?>"
                        href="?command=create">create an event</a></li>
                <?php
                if(isset($_SESSION["login_status"]) && $_SESSION["login_status"] == true){
                    ?>

                <!-- we should move the hello away from the navbar -->
                <!-- <li class="nav-item">Hello,
                        <?=$_SESSION["username"]?>!  </li> -->

                <li class="nav-item"><a class="nav-link <?php if($_SESSION["activePage"] == "myevents") echo "active"?>"
                        href="?command=myevents"> my events </a></li>



                <li class="nav-item"><a class="nav-link <?php if($_SESSION["activePage"] == "login") echo "active"?>"
                        href="?command=logout"> <span> logout? </span></a></li>



                <?php
                }else{
                    ?> <li class="nav-item"><a
                        class="nav-link <?php if($_SESSION["activePage"] == "login") echo "active"?>"
                        href="?command=login">log in</a></li> <?php
                }
                
                ?>
            </ul>
        </div>
    </div>
</nav>

<script>
    
    $(".navbar-brand").hover(
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