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
            <input class="w-100 form-control form-control-lg" type="text" name="search" placeholder="Type in your search...">
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
                <a href="/logout" class="mx-1">Logout</a>
                <a href="/useraccount" class="mx-1">Account</a>
                <a href="/admin" class="mx-1">Admin</a>
                <a href="/contact" class="mx-1">Contact</a>
            <?php
            }
            else{
        ?>
            <a href="/login" class="mx-1">Login</a>
            <a href="/register" class="mx-1">Register</a>
            <a href="/contact" class="mx-1">Contact</a>
        <?php
            }
        ?>
    </div>
</div>


            


