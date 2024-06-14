<?php auth() ?>

<header>
    <nav>
        <a class="navbarcol" href="/">home</a>
        <?php if (isset($_SESSION["admin"])) { ?> <a class="navbarcol" href="/create">add a room</a> <?php } ?>
        <a class="navbarcol" href="/reserve">reserve</a>
        <a class="navbarcol" href="/reservations">my reservations</a>
        <a class="navbarcol" href="/logout">logout</a>
        
    </nav>
</header>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentUrl = window.location.pathname;
        var navLinks = document.querySelectorAll("nav a");

        navLinks.forEach(function(link) {
            if (link.getAttribute("href") === currentUrl) {
                link.classList.add("current");
            }
        });
    });
</script>
