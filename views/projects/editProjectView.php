<?php 

    $title = "Editer le Projet";
    ob_start();

?>

    <section class="container my-5">

        <h2 class="text-secondary">Modifier le projet</h2>

        <?php

            while($projet = $requete->fetch()) {

        ?>
        
        <form class="mt-4" method="POST" enctype="multipart/form-data">
            
            <p>
                <label class="form-label" for="title">Titre :</label><br>
                <input class="form-control" type="text" id="title" name="editTitle" value="<?=htmlspecialchars($projet['title'])?>" required>
            </p>

            <p>
                <label for="image" class="form-label">Image actuelle :</label><br>
                <img src="/uploads/projects/<?=htmlspecialchars($projet['img'])?>" alt="" class="w-25">
                <input class="form-control w-25" type="text" id="image" value="<?=htmlspecialchars($projet['img'])?>" disabled readonly>
            </p>    

            <p>
                <label for="img" class="form-label">Nouvelle image :</label>
                <input class="form-control" type="file" id="img" name="image">
            </p>                          
                
            <p>
                <label class="label-form" for="content">Contenu :</label><br>
                <textarea class="form-control" id="content" name="editContent" rows="10" required><?=htmlspecialchars($projet['content'])?></textarea>
            </p>
            
            <p>
                <button class="btn btn-secondary" type="submit">Modifier</button>
            </p>
            
        </form>

        <a class="link-success" href="/projects">Retour aux projets</a>
        

        <?php

            }
            
        ?>

    </section>



<?php

    $content = ob_get_clean();

    require('views/base.php');
?>