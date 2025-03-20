<?php

    $title = "Erreur";

    ob_start();

?>

    <section class="container mt-5 text-danger">

        <h1> OUPS !</h1>
        <p> <?= $error?> </p>

    </section>

<?php

    $content = ob_get_clean();
    require ('base.php');

?>