<?php 

    $title = "Articles";
    ob_start();

?>

    <section class="container my-4">
        
        <h2 class="text-secondary">Articles</h2>

        <?php

            if(isset($_SESSION['connect']) && $_SESSION['role'] == "admin") {

                 echo'<a href="/article-create" class="link-success text-decoration-none">Créer un article</a>';
            
            }
        ?>
        <div class="row ">
            
        
            <?php

                while($article = $requete->fetch()) {
                
            ?>

                    <!-- Affichage des Articles -->
                
                    <div class="col-lg-4 col-md-6 align-self-end"> 
                        
                       <div class="card my-3"> 

                            <a href="/article/<?=$article['id']?>" class="text-decoration-none link-secondary">
                                <img class="card-img-top" src="/uploads/articles/<?= $article['img'] ?>" />
                                <div class="card-body">
                                    <h5 class="card-title text-center"><?= $article['title']?></h5>
                                </div>
                            </a> 

                            <?php

                                if(isset($_SESSION['connect']) && $_SESSION['role'] == "admin") {

                            ?>
                            
                                    <div class="card-footer">
                                        <div class="row">                                    

                                            <!-- Modifier -->
                                            <div class="col-6 text-center">
                                                <button type="button" class="btn btn-outline-tertiary w-100"><a href="/article-edit/<?=$article['id']?>" class="text-decoration-none text-secondary">Modifier</a></button>
                                            </div>


                                            <!-- Supprimer en modal-->
                                            <div class="col-6 text-center">
                                                <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#supprimer<?= $article['id'] ?>">Supprimer</button>
                                            </div>

                                        </div> 
                                    </div>  
                                    
                                    <!--modal-->

                                    <div class="modal fade" id="supprimer<?= $article['id'] ?>" tabindex="-1" data-bs-backdrop="static">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <h5 class="modal-title">Confirmation</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                </div>

                                                <div class="modal-body">

                                                    <p>Voulez-vous vraiment supprimer l'article <strong><?=htmlspecialchars($article['title'])?></strong> ?</p>

                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                    <a href="/article-delete/<?=$article['id']?>" class="btn btn-danger">Supprimer</a>

                                                </div>
                                
                                            </div>
                                        </div>
                                    </div>
                            
                                <?php

                                    }

                                ?>

                        </div>                                      
                    </div>      

            <?php

                }
                    
            ?>

        </div>        
                

    </section>



<?php

    $content = ob_get_clean();
    require('views/base.php');

?>