<?php

    $title = "Inscription";

    ob_start();

?>

    <section class="container my-4">

        <h2>S'inscrire</h2>

        
        <form class="my-4" method="post" >

            <p>
                <label for="username" class="form-label">Nom d'utilisateur :</label><br>               
                <input type="text" class="form-control w-25" id="username" name="username" placeholder="Votre nom d'utilisateur" required />
            </p>
        
            <p>
                <label for="email" class="form-label">Email :</label><br>               
                <input type="email" class="form-control w-25" id="email" name="email" placeholder="Votre adresse email" required />
            </p>

            <p>
                <label for="password" class="form-label">Mot de passe :</label><br>
                <input type="password" class="form-control w-25" id="password" name="password" placeholder="Mot de passe" required />
            </p>
            <p>
                <label for="passwordTwo" class="form-label">Retapez votre mot de passe :</label><br>
                <input type="password" class="form-control w-25" id="passwordTwo" name="passwordTwo" placeholder="Retapez votre mot de passe" required />
            </p>              
                       
            <button class="btn btn-secondary" type="submit">S'inscrire</button>
        </form>

        <p class="grey">Déjà inscrit? <a href="/login ">Connectez-vous</a>.</p>

    </section>


<?php

    $content = ob_get_clean();
    require ('views/base.php');

?>