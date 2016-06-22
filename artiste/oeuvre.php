<?php
session_start();
include "../con_sql.php";

$_SESSION["ID"] = $_GET['ID'];
//Permet de voir si l'utilisateur a like ou non cette oeuvre
if(isset($_SESSION["login_artist"]))
{
$req_like='select * from user_like where oeuvre_id="'.$_GET['ID'].'" AND user="'.$_SESSION["login_artist"].'"';
$resultat_like = mysql_query($req_like);
$like = mysql_fetch_array($resultat_like);
}



//Récupération des informations de l'artiste via l'ID de son oeuvre 

$req_info_artist='select * from oeuvres where id="'.$_GET['ID'].'"';
$resultat_info_artist = mysql_query($req_info_artist);
$info_artist = mysql_fetch_array($resultat_info_artist);

if(!$info_artist[0])
{
	header("location:error.php");
}
		

$req_info='select * from user_artist where login="'.$info_artist['user'].'"';
$resultat_info = mysql_query($req_info);
$info = mysql_fetch_array($resultat_info);
?>
	
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 



<html class="no-js"> <!--<![endif]-->
    <head>
	


        <title><?php echo $info_artist['titre']; ?></title>

        <!-- meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        
        <!-- stylesheets -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/css/owl.carousel.css">
        <link rel="stylesheet" href="../assets/css/owl.theme.css">
        <link rel="stylesheet" href="../assets/css/style.css">
		

        <!-- scripts -->
        <script type="text/javascript" src="../assets/js/modernizr.custom.97074.js"></script>
		
		<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="../assets/css/magnific-popup.css">

<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- Magnific Popup core JS file -->
<script src="../assets/js/jquery.magnific-popup.js"></script>
		
<script>
$(document).ready(function(){
    $("button").click(function(){
        $.ajax({url: "like_test.php", success: function(result){
            $("#divlike").html(result);
        }});
    });
});
</script>

<script>
$(document).ready(function() {
  
    $('.image-popup-vertical-fit').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }
          
    });
  
});
</script>
	


    </head>

    <body>

        <div id="home-page">

           <!-- Ajout du HEADER -->
		   <?php include "header.php"; ?>


            

            <div class="main-content">
                <div class="container">

				<!-- begin our designation section -->

               
                 <!-- end of designation section -->

                    
					
					<!--  begin portfolio section  -->
                <section class="bg-light-gray">
                    <div class="container">

                        <div class="headline text-center">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <h2 class="section-title"><?php echo $info_artist['titre']; ?></h2>
                                    <p class="section-sub-title">
                                        <?php echo $info_artist['description']; ?>
                                    </p> <!-- /.section-sub-title -->
                                </div>
                            </div>
                        </div> <!-- /.headline -->
						
						<div class="text-center">
                        <?php
						//Si l'oeuvre est unn texte
						if($info_artist['type']!="Textes")
						{
							?>
						<a class="image-popup-vertical-fit" href="<?php echo $info_artist['icone']; ?>" title="<< <?php echo $info_artist['titre']; ?> >> de <b><?php echo $info["login"]; ?></b>">
                            <img src="<?php echo $info_artist['icone']; ?>" width="80%" />
                        </a>
						<?php
						}else echo $info_artist['fichier'];
						?>
						
						
						<br><br>
						
						
						<?php
						//Si l'oeuvre est une musique
						if($info_artist['type']=="Musiques")
						{
							?>
							
							<audio controls="controls">

								<source src="<?php echo $info_artist['fichier']; ?>" type="audio/mpeg">

							</audio>
							<br>
							
						

							<?php
						}
						
						//Si l'oeuvre est une vidéo
						if($info_artist['type']=="Videos")
						{
							?>
							<video controls src="<?php echo $info_artist['fichier']; ?>">Ici la description alternative</video>
							<?php
						}
						?>
						
						<!-- Partie "Like" -->
						<span class="like">
						<div id='divlike'>
						<?php if(isset($_SESSION["login_artist"]))
{ if(!$like[0])
						{
	
											echo "<button><i class='fa fa-heart-o'></i></button><br>";
											
}else echo "<button><i class='fa fa-heart'></i></button><br>"; }else echo "<i class='fa fa-heart-o'></i><br>";  ?>
						
							<?php echo $info_artist['likes'];
								  echo " likes";?>
						</div>
						</span>

                                                                                                                                              

                            
						
						</div>
                        </div> <!-- end of portfolio-item-list -->
						

                        
                        
						
                 </section>
<!-- contact adresses section begin -->
                    <section class="contact-address bg-white">
                        <div class="row">

                            <div class="col-md-4 col-xs-12">
                                <div class="address-info">
                                    <div class="row">

                                        <div class="col-md-3 col-xs-3">
                                            <div class="address-info-icon text-center center-block bg-light-gray">
											<i class="fa fa-user" aria-hidden="true"></i>
                                                
                                            </div> <!-- /.address-info-icon -->
                                        </div>

                                        <div class="col-md-9 col-xs-9 address-info-desc">
                                            <h3>Artiste :</h3>
                                            <p><a href="artiste.php?ID=<?php echo $info["id"];?>" >
                                                <?php 
															echo $info["login"]; 
													 ?>
													 </a>
                                            </p>
                                        </div> <!-- /.address-info-desc -->

                                    </div>
                                </div> <!-- /.address-info -->
                            </div>

                            <div class="col-md-4 col-xs-12">
                                <div class="address-info">
                                    <div class="row">

                                        <div class="col-md-3 col-xs-3">
                                            <div class="address-info-icon text-center center-block bg-light-gray">
                                                <i class="fa fa-info" aria-hidden="true"></i>
                                            </div> <!-- /.address-info-icon -->
                                        </div>

                                        <div class="col-md-9 col-xs-9 address-info-desc">
                                            <h3>Informations </h3>
                                            <p>
                                                Nom : <?php echo $info["nom"]; ?>
                                                <br/>
                                                Prenom : <?php echo $info["prenom"]; ?>
												
                                            </p>
                                        </div> <!-- /.address-info-desc -->

                                    </div>
                                </div> <!-- /.address-info -->
                            </div>

                            <div class="col-md-4 col-xs-12">
                                <div class="address-info">
                                    <div class="row">

                                        <div class="col-md-3 col-xs-3">
                                            <div class="address-info-icon text-center center-block bg-light-gray">
                                                <i class="fa fa-envelope-o"></i>
                                            </div> <!-- /.address-info-icon -->
                                        </div>

                                        <div class="col-md-9 col-xs-9 address-info-desc">
                                            <h3>Adresse Email</h3>
                                            <p>
                                                <?php echo $info["email"]; ?>
                                            </p>
                                        </div> <!-- /.address-info-desc -->

                                    </div>
                                </div> <!-- /.address-info -->
                            </div>

                        </div>
                    </section> <!-- /.contact-address -->				 
                        </div>
                            
                    </div>
                 
                <!--   end of portfolio section  -->

				<br>
				
				<br><br>
                    

                </div> <!-- container -->
            </div>
            <!-- main-content end -->

            <?php include "footer.php"; ?>
            
        </div> <!-- end of /#home-page -->
		
		
		

        <!--  Necessary scripts  -->

        
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/owl.carousel.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.hoverdir.js"></script>
		


        <!-- script for portfolio section using hoverdirection -->
        <script type="text/javascript">
            $(function() {

                $('.portfolio-item > .item-image').each( function() { $(this).hoverdir({
                    hoverDelay : 75
                }); } );

            });
        </script>


        <!-- script for twitter-feed using owl carousel-->
        <script type="text/javascript">
            $(document).ready(function() {
 
                $("#twit").owlCarousel({
                 
                    navigation : true, // Show next and prev buttons
                    slideSpeed : 100,
                    paginationSpeed : 400,
                    navigationText : false,
                    singleItem: true,
                    autoPlay: true,
                    pagination: false
                });
 
            });
        </script>


        <!-- script for testimonial section using owl carousel -->
        <script type="text/javascript">
            $(document).ready(function() {
 
                $("#client-speech").owlCarousel({
                 
                    autoPlay: 5000, //Set AutoPlay to 3 seconds
                    stopOnHover: true,
                    singleItem:true
                });
 
            });
        </script>
		
		
		
		
    </body>
</html>