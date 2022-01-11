<?php
function createNavbar(){
    $username = $_COOKIE["user"];
    return "
<div class=navbar>
    <a class=hvr-underline-from-center href=home>chess2gether</a>
    <div class='dropdown'>
        <button onClick='myFunction()' class='hvr-underline-from-center dropbtn'>
            {$username}
        </button>
        <div id='myDropdown' class='dropdown-content''>
            <a href='/events' class='logout'>My events</a>
            <form action=home method='POST'>
                <input type='submit' class='logout' value='Logout'></input>
            </form>

        </div>
    </div>
</div>
";
}