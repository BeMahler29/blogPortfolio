# blogPortfolio
projet-passerelle N°2

Bonjour, 

Voici mon blog, portfolio pour la réalisation de mon projet-passerelle 2. 

J'ai passé beaucoup d'heures (environ 30h) à le réaliser. J'ai eu pas mal de problèmes au début, mais à force de recherches sur des forums, etc, je suis quand même parvenu à quelque chose qui me plait beaucoup. J'espère qu'il vous plaira aussi.

J'ai bien respecté les consignes demandées pour le site :

  - Système d'inscription, connexion, déconnexion pour les utilisateur (avec cookie, chiffrement des mots de passe, système de rôle, bannissement) 
  - Création, modification, suppression et biensûr lecture des projets et articles (Avec protection htmlspecialchars)
  - Permettre aux utilisateurs connectés de laisser un avis sur chaque projet / article.


  - J'ai également essayé de respecter l'architecture MVC avec POO.  
  - Lors de la modification ou suppression de l'image des articles / projets, cette dernière est supprimée pour éviter d'avoir des fichiers inutiles.

Problèmes rencontrés: 

  - J'ai eu un bug avec le footer qui ne restait pas collé en bas si je n'utilisait pas flexbox.
  - Des problèmes sur comment récupérer l'url
  - J'ai également eu des soucis lors des redirections avec les headers()


Ma BDD s'appelle projet_passerelle_2 et les tables:

 - articles (id (auto-increment), title, img (valeur par défaut = null), content, date (current_timestamp))
 - projects (id (auto-increment), title, img (valeur par défaut = null), content, date (current_timestamp))
 - testimonials (id (auto-increment), article_id (valeur par défaut = null), project_id (valeur par défaut = null), user_id, content, date_create (current_timestamp))
 - users (id (auto-increment), username, email, password, secret, role (valeur par défaut = user), blocked (valeur par défaut = 0), creation_date (current_timestamp))



Merci et salutations
