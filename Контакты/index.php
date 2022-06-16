<?php
    if ($_SERVER['REQUEST_SCHEME'] == "http")
        echo "<script>window.location.replace('https://".$_SERVER['SERVER_NAME']."/".$_SERVER['PATH_INFO']."');</script>";

    include __DIR__."/page.html";