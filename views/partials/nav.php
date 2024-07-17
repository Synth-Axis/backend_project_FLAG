 <!-- NAV BAR -->

<div class="col-2">
    <a href="/">
        <img class="img-fluid" src="/assets/Misc/warrior_icon.png" alt="" style="width: 96px">
    </a>
</div>
<div class="col-7">
    <div class="form-outline form-white">
        <form method="post" action="/searchresults">
        <div class="d-flex form-inputs">
            <input class="w-100 form-control form-control-lg" type="text" name="search" placeholder="Search for a game...">
            <button class="btn btn-outline-light btn-lg px-3 mx-2" type="submit">Search</button>
        </div>
        </form>
    </div>   
</div>         
<div class="col-3">
    <div class="col">
        <?php
            if( isset($_SESSION["user_id"]) ){         
        ?>
                <a class="text-decoration-none text-light mx-2" href="/logout">Logout</a>
                <a class="text-decoration-none text-light mx-2" href="/useraccount">Account</a>
                <a class="text-decoration-none text-light mx-2" href="/adminheader">Admin</a>
            <?php
            }
            else{
        ?>
            <a class="text-decoration-none text-light mx-2" href="/login" class="mx-1">Login</a>
            <a class="text-decoration-none text-light mx-2" href="/register" class="mx-1">Register</a>
        <?php
            }
        ?>
    </div>
</div>


            


