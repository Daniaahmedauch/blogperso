<?php 
var_dump("blogg");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> mon blog</title>
</head>
<body>


<?php

	   /*
	   		Enregistrer le nouveau post
	   */

       $titre=$_POST['titre'];
       $commentaires=$_POST['commentaires'];

         // on se connecte à mysql :

         
        try 
       {  

           $bdd = new PDO( 'mysql:host=localhost;dbname=blog;charset=utf8','dania','0000');
         
       }

          // en cas d'erreur on affiche un message :

        
        catch (Exception $e)
        {   
           die('Erreur : ' . $e->getMessage());
      
        }

       $req = $bdd->prepare('
       		INSERT INTO articles ( titre, commentaires ) 
       		VALUES( :titre, :commentaires,);
       	');

       $req->execute(array(
	    	':titre' => $titre,
       		':commentaires' => $commentaires
       ));


   	   /*

   	   		Afficher la page
   	   	*/

       $reponse = $bdd->query('SELECT * FROM articles');
       while($donnees=$reponse->fetch())

	 {

?>

		<!--  affichage des données -->
<?php
			echo '<p> ' . $donnees ['titre'] .  ' </p> '; 
			echo '<p>'  . $donnees['commentaires'] .'</p>';
      }

?>
	


</body>
</html>





