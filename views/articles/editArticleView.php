<?php 

    $title = "Editer Article";
    ob_start();

?>

    <section class="container my-5">

        <h2 class="text-secondary">Modifier l'article</h2>

        <?php

            while($article = $requete->fetch()) {

        ?>
        
        <form class="mt-4" method="POST" enctype="multipart/form-data">
            
            <p>
                <label class="form-label" for="title">Titre :</label><br>
                <input class="form-control" type="text" id="title" name="editTitle" value="<?=htmlspecialchars($article['title'])?>" required>
            </p>

            <p>
                <label for="image" class="form-label">Image actuelle :</label><br>
                <img src="/uploads/articles/<?=htmlspecialchars($article['img'])?>" alt="" class="w-25">
                <input class="form-control w-25" type="text" id="image" value="<?=htmlspecialchars($article['img'])?>" disabled readonly>
            </p>    

            <p>
                <label for="img" class="form-label">Nouvelle image :</label>
                <input class="form-control" type="file" id="img" name="image">
            </p>                          
                
            <p>
                <label class="label-form" for="content">Contenu :</label><br>
                <textarea class="form-control" id="content" name="editContent" rows="10" required><?=htmlspecialchars($article['content'])?></textarea>
            </p>
            
            <p>
                <button class="btn btn-secondary" type="submit">Modifier</button>
            </p>
            
        </form>

        <a class="link-success" href="/articles">Retour aux articles</a>
        

        <?php

            }
            
        ?>

    </section>



<?php

    $content = ob_get_clean();

    require('views/base.php');
?>