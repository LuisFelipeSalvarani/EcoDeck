<?php
if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];

    if (file_exists($pagina)) {
        include($pagina);
    } else {
        echo "<p>Página não encontrada.</p>";
    }
} else {
    include("inicio.php");
}