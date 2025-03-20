<?php 

    $title = "Article";
    ob_start();

?>

    <section class="container my-4">

        <?php

            while($article = $requete->fetch()) {

        ?>
        
                <h2 class="text-secondary"><?=htmlspecialchars($article['title'])?></h2>

                <div class="row mt-4">

                    <div class="col-lg-6">
                        <p>
                            <?= nl2br(htmlspecialchars($article['content']))?><br>    <!-- nl2br permet de tranformer les \n  (sauts de lignes) générer par les textarea en <br> -->  
                        </p>
                        
                    </div>

                    <div class="col-lg-6">
                        <img src="/uploads/articles/<?= $article['img'] ?>" alt="photo article" class="mw-100">
                    </div>
                </div>    
                <a class="link-success" href="/articles">Retour aux articles</a>    
        

       

            <!-- Commentaires -->
            
            <?php

                if (isset($_SESSION['connect'])) { ?>

                    <form class="my-4" action="/add-testimonials" method="POST">
                        
                        <textarea class="form-control" name="content" id="content" placeholder="Donner son avis..." required></textarea>
                        <input type="hidden" name="articleId" value="<?= $article['id'] ?>">
                        <button class="btn mt-4 btn-secondary" type="submit">Envoyer</button>

                    </form>
            <?php

                } 
                
                else { ?>

                    <p class="mt-4"><a href="/login">Connectez-vous pour commenter.</a></p>  

            <?php

                }
                while($testimonials = $reqTestimonials->fetch()) { ?>

                    <div>

                        <strong><?= htmlspecialchars($testimonials['username']) ?></strong>
                        <p><?= nl2br(htmlspecialchars($testimonials['content'])) ?></p>
                        <small><?= $testimonials['date_create'] ?></small>

                    </div>
        
            <?php 

                }

            ?> 
        
        <?php

            }
            
        ?>




    </section>



<?php

    $content = ob_get_clean();
    require('views/base.php');

?>