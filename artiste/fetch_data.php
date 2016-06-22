<?php
   
           
   if(isset($_POST['get_option']))
   {
     $host = 'localhost';
     $user = 'root';
     $pass = '';
           
     @mysql_connect($host, $user, $pass);

     @mysql_select_db('talent');
      

     $valeur = $_POST['get_option'];
     
	 if($valeur == "Images")
	 {
		 ?>
		 <h3>Fichiers de l'image :</h3>	
	<div class="form-group">
     <label for="fichier">Fichier Image (JPG, JPEG, PNG ou GIF) :</label><br />
     <input type="file" name="fichier" id="fichier" class="form-control" required="required" />
	</div>
	<?php
	 }
	 
	 if($valeur == "Videos")
	 {
		 ?>
		 <h3>Fichiers de la vidéo :</h3>
	<div class="form-group">
     <label for="icone">Icône de la vidéo (JPG, JPEG, PNG ou GIF) :</label><br />
     <input type="file" name="icone" id="icone" class="form-control" required="required" />
	</div>
	
	<div class="form-group">
     <label for="fichier">Fichier Vidéo (mp4, wmv ou avi) :</label><br />
     <input type="file" name="fichier" id="fichier" class="form-control" required="required" />
	</div>
	<?php
	 }
	 
	 if($valeur == "Musiques")
	 {
		 ?>
		 <h3>Fichiers de la musique :</h3>
	<div class="form-group">
     <label for="icone">Icône de la musique (JPG, JPEG, PNG ou GIF) :</label><br />
     <input type="file" name="icone" id="icone" class="form-control" required="required" />
	</div>
	
	<div class="form-group">
     <label for="fichier">Fichier Musique (mp3 seulement) :</label><br />
     <input type="file" name="fichier" id="fichier" class="form-control" required="required" />
	</div>
	<?php
	 }
	 
	 if($valeur == "Textes")
	 {
		 ?>
		 <h3>Votre texte :</h3>
	<div class="form-group">
	<textarea name="fichier" rows="5" cols="60" class="form-control" required="required"></textarea>
	</div>
	

	<?php
	 }
	 
   }

?>