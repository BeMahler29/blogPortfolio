<!-- Template de base pour l'affichage -->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/design/style.css">
    <title><?= $title ?></title>
</head>
<body class="bg-quaternary d-flex flex-column min-vh-100 m-0 p-0">     <!--utilisation de flexbox pour coller le footer en bas sinon ça bug lorsque la page est  plus large que haute -->


    <!-- En-tête -->
    
    <header>
        <nav class="navbar navbar-dark bg-dark navbar-expand-md sticky-top p-3">
            <div class="container">

            <div class="navbar-brand">
                    <a href="/home" class="nav-link">
                        <h3>Bertrand Mahler</h3>
                    </a>
                </div> 

                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav me-auto">

                        <li class="nav-item">
                            <a href="/projects" class="nav-link">Projets</a>
                        </li>
                        <li class="nav-item">
                            <a href="/articles" class="nav-link">Articles</a>
                        </li>                        
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">


                            <?php
                                
                                if (isset($_SESSION['connect'])) {  
                            ?>                            
                                <a href="#" role="button"  class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?=$_SESSION['username']?></a>

                                <ul class="dropdown-menu">
                                    
                                    <li><a href="/logout" class="dropdown-item">Se déconnecter</a></li>
                                    
                                </ul>

                            <?php
                                }
                                else {
                            ?>
                            
                                    <a href="#" role="button"  class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Compte</a>

                                    <ul class="dropdown-menu">
        
                                        <li><a href="/login" class="dropdown-item">Se connecter</a></li>
                                        <li><a href="/register" class="dropdown-item">S'inscrire</a></li>

                                    </ul>
                            
                            <?php
                                }
                            ?>
                                
                            

                        </li>
                    </ul>
                </div>
            </div>        
        </nav> 
    </header>
    
    <!-- Contenu -->                

    <main class="flex-grow-1">

        <?= $content ?>

    </main>
        
       
    
   <!-- Pied-de-page -->
    
    <footer class="bg-dark text-light mt-3 p-4 w-100">

        <div class="container">    

                &copy 2025 Bertrand Mahler                          

        </div>

    </footer>
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>