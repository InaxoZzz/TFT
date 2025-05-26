<?php
if (isset($_SESSION["login"])) {
    echo '<div id="header">
        Connecté en tant que <strong>' . htmlspecialchars($_SESSION["login"]) . '</strong>
    </div>';
}
?>
