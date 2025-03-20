<!-- Vue de la Page d'accueil -->


<?php 

    $title = "Accueil";
    ob_start();

?>

    <section class="container my-5">

        <?php
            
            if(isset($_GET['success'])) {

                echo '<div class="bg-success text-light text-center">Vous êtes maintenant connecté.</div><br>';

            }

        ?>
        
        <div class="row">
            <div class="col-md-5 col-12 order-2">
                <img class="w-100" src="/public/assets/Accueil.jpg" alt="photo">
            </div>
            <div class="col order-1">
                <p>
                    Bonjour, je m'appelle Bertrand Mahler, 34 ans. Je suis né en Suisse, dans le canton de Neuchâtel, où j'ai vécu durant 29 ans. En 2019, j'ai emmenagé à la Vallée de Joux, dans le canton de Vaud, avec la personne qui est devenue ma merveilleuse femme et avec qui j'ai eu la chance de devenir le papa de deux petites filles incroyables. 
                </p>
                <p>
                    J'ai d'abord fait une formation d'électricien de 2005 à 2009. Ensuite, j'ai refais une autre formation, de polymécanicien / micromécanicien cette fois-ci, dans le domaine de l'horlogerie de 2011 à 2015. Cela consiste à fabriqué les pièces pour les mouvements horlogers. Que cela soit avec des machines (CNC) ou de manière plus traditionnelle (avec un tour 102, pointeuse SIP, etc).  
                </p>
                <p>
                    Depuis décembre 2024, je suis la formation "Rocket" de Believemy pour, je l'espère, devenir Développeur Web. J'ai toujours été fan d'informatique et quand j'étais petit, je voulais devenir créateur de jeux vidéos. Mais je ne suis pas rester petit et l'école n'était pas la porte d'à côté et encore moins bon marché... Petit à petit, j'ai voulu revenir sur mon idée de base, développer des jeux ou autre chose. Mais le problème, c'est que je ne suis pas du tout créatif... Par la suite, je me suis rendu compte que ce qui me plaisait c'était de créer avec du code. De suivre cette formation "Rocket", me permet de développer ma créativité et de coder.  
                </p>
            </div>
        </div>

    </section>

<?php

    $content = ob_get_clean();
    require('base.php');

?>