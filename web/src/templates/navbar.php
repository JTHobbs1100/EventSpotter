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
                <li class="nav-item"><a class="nav-link" href="?command=homepage">home</a></li>
                <li class="nav-item"><a class="nav-link" href="?command=events">events</a></li>
                <li class="nav-item"> <a class="nav-link" href="?command=create">create an event</a></li>
                <?php
                if($_SESSION["login_status"]){
                    ?> <li class="nav-item"><a class="nav-link active" href="?command=logout">Hello,
                        <?=$_SESSION["username"]?>! <span style="color: grey"> Logout? </span></a></li> <?php
                }else{
                    ?> <li class="nav-item"><a class="nav-link active" href="?command=login">login</a></li> <?php
                }
                
                ?>
            </ul>
        </div>
    </div>
</nav>