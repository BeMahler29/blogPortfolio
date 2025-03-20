<?php 

    $title = "Créer Projet";
    ob_start();

?>

    <section class="container my-5">

        <h2 class="text-secondary">Créer un projet</h2>
        
        
        <form class="mt-4" method="POST" enctype="multipart/form-data">
            
            <p>
                <label class="form-label" for="title">Titre :</label><br>
                <input class="form-control" type="text" id="title" name="title" placeholder="Le titre de votre projet" required>
            </p>            

            <p>
                <label for="img" class="form-label">Image :</label>
                <input class="form-control" type="file" id="img" name="image">
            </p>                          
                
            <p>
                <label class="label-form" for="content">Contenu :</label><br>
                <textarea class="form-control" id="content" name="content" rows="10" placeholder="Le contenu de votre projet" required></textarea>
            </p>
            
            <p>
                <button class="btn btn-secondary" type="submit">Créer</button>
            </p>
            
        </form>

        <a class="link-success" href="/projects">Retour aux projets</a>
        

    </section>



<?php

    $content = ob_get_clean();

    require('views/base.php');