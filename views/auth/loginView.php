<?php

    $title = "Login";

    ob_start();

?>

    <section class="container my-4">

        <?php
            
            if(isset($_GET['success'])) {

                echo '<div class="bg-success text-light text-center">Vous avez réussi votre inscription.</div><br>';

            }

        ?>

        
        <h2>Login</h2>
        

        <form class="my-4" method="post" >

            <p>
                <label for="email" class="form-label">Email :</label><br>               
                <input type="text" class="form-control w-25" id="email" name="email" placeholder="Votre email" required />
            </p>

            <p>
                <label for="password" class="form-label">Mot de passe :</label><br>
                <input type="password" class="form-control w-25" id="password" name="password" placeholder="Mot de passe" required />
            </p>

            <p>
                <button class="btn btn-secondary" type="submit">S'inscrire</button>
            </p>
            
            
            <label id="option"><input type="checkbox" name="auto" checked />Se souvenir de moi</label>
        </form>


        <p class="grey">Première visite sur mon Blog? <a href="/register">Inscrivez-vous</a>.</p>
        
           

    </section>

<?php

    $content = ob_get_clean();
    require ('views/base.php');

?>