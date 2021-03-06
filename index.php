<?php
session_start();
include "con_sql.php";

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 



<html class="no-js"> <!--<![endif]-->
    <head>

        <title>Youmenie - Concours de talents</title>
        <link rel="icon" type="image/ico" href="assets/img/site_LOGO.ico">
        <!-- meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        
        <!-- stylesheets -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/css/owl.theme.css">
        <link rel="stylesheet" href="assets/css/style.css">


        <!-- scripts -->
        <script type="text/javascript" src="assets/js/modernizr.custom.97074.js"></script>
         <!-- script for portfolio section using hoverdirection -->
        <script type="text/javascript">
            $(function() {

                $('.portfolio-item > .item-image').each( function() { $(this).hoverdir({
                    hoverDelay : 75
                }); } );

            });
        </script>

    </head>

    <body>

    <!-- Ajout du HEADER -->
	<?php include "header.php"; ?>

        <div id="home-page">

           

		   

			<section class="bg-light-gray skill">
                    <center>
					<div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>Youmenie : LE concours des jeunes talents francophone</h2>
                                <p>
                                <p> Bienvenue sur le site Youmenie</b></p>

								<p> Notre objectif est de regrouper des communautés artistiques autour de différents thèmes afin de répérer de jeunes talents prometteurs </p>

								<p> Que vous soyez musicien, vidéaste, écrivain ou bien travailleur de l'image.Proposez vos oeuvres sur le site et laissez le public juger de votre potentiel ! </p>
								<p>Ce concours réservé à la communauté Francophone vous permettra soit de découvrir des artistes soit justement de trouver votre public
							    .Viens tenter ta chance et rejoins notre communauté créative</p>
								
                                </p>
                            </div>

                            <div class="col-md-5">
                                <div class="skill-level">
                                    <img src="img/The_Rogue_Moog.jpg" alt="Image d'un musicien" style="height:30em;">
                                </div> <!-- /.skill-level -->
                            </div>
                        </div>
                    </div>
					</center>
                </section>
            <!--  begin portfolio section  -->
                <section class="bg-light-gray">
                    

                        <div class="headline text-center">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <h3 class="section-title"><u>Notre Podium musical <i class="fa fa-music" aria-hidden="true"></i></u></h3>
                                    <p class="section-sub-title">
                                        
                                    </p> <!-- /.section-sub-title -->
                                </div>
                            </div>
                        </div> <!-- /.headline -->
                        
                        <?php
                        $req="SELECT * FROM oeuvres WHERE type ='Musiques' AND likes > 0 ORDER BY likes DESC LIMIT 3 ";
                        $sql=mysql_query($req);
                        if(mysql_num_rows($sql)<1)
                        {
                            echo "<center><h3>Aucune musique n'a été postée</h3></center>";
                        }
                        else {
                            $data = mysql_fetch_assoc($sql);
                            ?>
                            
                            <div class="portfolio-item-list">
                            <div class="row">
                            
                            <?php

                            while($data)
                            {
                        ?>
                        

                        
                            <!-- Affichage oeuvre -->
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="portfolio-item">
                                        <div class="item-image">
                                            <a href="artiste/oeuvre.php?ID=<?php echo $data["id"] ?>">
                                                <img src="artiste/<?php echo $data["icone"]?>" class="img-responsive center-block" alt="portfolio 1">
                                                <div><span><i class="fa fa-plus"></i></span></div>
                                            </a>
                                        </div>

                                        <div class="item-description">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <span class="item-name">
                                                        <?php echo $data["titre"]?>
                                                    </span>
                                                    <span>
                                                        <?php echo $data["description"]?>
                                                    </span>
                                                </div>
                                                <div class="col-xs-6">
                                                    <span class="like">
                                                        <i class="fa fa-heart-o"></i>
                                                        <?php echo $data["likes"] ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> <!-- end of /.item-description -->
                                    </div> <!-- end of /.portfolio-item -->
                                </div>

                                                                                                                                              

                            
                        <?php $data=mysql_fetch_assoc($sql);}
                        ?>
                        </div>
                        </div> <!-- end of portfolio-item-list -->
                        <?php } ?>

                        
                            
                    
                </section> 
                <!--   end of portfolio section  -->
                <!--  begin portfolio section  -->
                <section class="bg-light-gray">
                    

                        <div class="headline text-center">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <h3 class="section-title"><u>Notre Podium imagerie <i class="fa fa-picture-o" aria-hidden="true"></i></u></h3>
                                    <p class="section-sub-title">
                                        
                                    </p> <!-- /.section-sub-title -->
                                </div>
                            </div>
                        </div> <!-- /.headline -->
                        
                        <?php
                        $req="SELECT * FROM oeuvres WHERE type ='Images' AND likes > 0 ORDER BY likes DESC LIMIT 3 ";
                        $sql=mysql_query($req);
                        if(mysql_num_rows($sql)<1)
                        {
                            echo "<center><h3>Aucune image n'a été postée</h3></center>";
                        }
                        else {
                            $data = mysql_fetch_assoc($sql);
                            ?>
                            
                            <div class="portfolio-item-list">
                            <div class="row">
                            
                            <?php

                            while($data)
                            {
                        ?>
                        

                        
                            <!-- Affichage oeuvre -->
                                <div class="col-md-4 col-sm-6">
                                    <div class="portfolio-item">
                                        <div class="item-image">
                                            <a href="artiste/oeuvre.php?ID=<?php echo $data["id"] ?>">
                                                <img src="artiste/<?php echo $data["icone"]?>" class="img-responsive center-block" alt="portfolio 1">
                                                <div><span><i class="fa fa-plus"></i></span></div>
                                            </a>
                                        </div>

                                        <div class="item-description">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <span class="item-name">
                                                        <?php echo $data["titre"]?>
                                                    </span>
                                                    <span>
                                                        <?php echo $data["description"]?>
                                                    </span>
                                                </div>
                                                <div class="col-xs-6">
                                                    <span class="like">
                                                        <i class="fa fa-heart-o"></i>
                                                        <?php echo $data["likes"] ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> <!-- end of /.item-description -->
                                    </div> <!-- end of /.portfolio-item -->
                                </div>

                                                                                                                                              

                            
                        <?php $data=mysql_fetch_assoc($sql);}
                        ?>
                        </div>
                        </div> <!-- end of portfolio-item-list -->
                        <?php } ?>

                        
                            
                    
                </section> 
                <!--   end of portfolio section  -->
                <!--  begin portfolio section  -->
                <section class="bg-light-gray">
                    

                        <div class="headline text-center">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <h3 class="section-title"><u>Notre Podium vidéaste <i class="fa fa-video-camera" aria-hidden="true"></i></u></h3>
                                    <p class="section-sub-title">
                                        
                                    </p> <!-- /.section-sub-title -->
                                </div>
                            </div>
                        </div> <!-- /.headline -->
                        
                        <?php
                        $req="SELECT * FROM oeuvres WHERE type ='Videos' AND likes > 0 ORDER BY likes DESC LIMIT 3 ";
                        $sql=mysql_query($req);
                        if(mysql_num_rows($sql)<1)
                        {
                            echo "<center><h3>Aucune vidéo n'a été postée</h3></center>";
                        }
                        else {
                            $data = mysql_fetch_assoc($sql);
                            ?>
                            
                            <div class="portfolio-item-list">
                            <div class="row">
                            
                            <?php

                            while($data)
                            {
                        ?>
                        

                        
                            <!-- Affichage oeuvre -->
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="portfolio-item">
                                        <div class="item-image">
                                            <a href="artiste/oeuvre.php?ID=<?php echo $data["id"] ?>">
                                                <img src="artiste/<?php echo $data["icone"]?>" class="img-responsive center-block" alt="portfolio 1">
                                                <div><span><i class="fa fa-plus"></i></span></div>
                                            </a>
                                        </div>

                                        <div class="item-description">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <span class="item-name">
                                                        <?php echo $data["titre"]?>
                                                    </span>
                                                    <span>
                                                        <?php echo $data["description"]?>
                                                    </span>
                                                </div>
                                                <div class="col-xs-6">
                                                    <span class="like">
                                                        <i class="fa fa-heart-o"></i>
                                                        <?php echo $data["likes"] ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> <!-- end of /.item-description -->
                                    </div> <!-- end of /.portfolio-item -->
                                </div>

                                                                                                                                              

                            
                        <?php $data=mysql_fetch_assoc($sql);}
                        ?>
                        </div>
                        </div> <!-- end of portfolio-item-list -->
                        <?php } ?>

                        
                            
                    
                </section> 
                <!--   end of portfolio section  -->
                <!--  begin portfolio section  -->
                <section class="bg-light-gray">
                    

                        <div class="headline text-center">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <h3 class="section-title"><u>Notre Podium textuel <i class="fa fa-font" aria-hidden="true"></i></u></h3>
                                    <p class="section-sub-title">
                                        
                                    </p> <!-- /.section-sub-title -->
                                </div>
                            </div>
                        </div> <!-- /.headline -->
                        
                        <?php
                        $req="SELECT * FROM oeuvres WHERE type ='Textes' AND likes > 0 ORDER BY likes DESC LIMIT 3 ";
                        $sql=mysql_query($req);
                        if(mysql_num_rows($sql)<1)
                        {
                            echo "<center><h3>Aucun texte n'a été posté</h3></center>";
                        }
                        else {
                            $data = mysql_fetch_assoc($sql);
                            ?>
                            
                            <div class="portfolio-item-list">
                            <div class="row">
                            
                            <?php

                            while($data)
                            {
                        ?>
                        

                        
                            <!-- Affichage oeuvre -->
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="portfolio-item">
                                        <div class="item-image">
                                            <a href="artiste/oeuvre.php?ID=<?php echo $data["id"] ?>">
                                                <img src="artiste/<?php echo $data["icone"]?>" class="img-responsive center-block" alt="portfolio 1">
                                                <div><span><i class="fa fa-plus"></i></span></div>
                                            </a>
                                        </div>

                                        <div class="item-description">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <span class="item-name">
                                                        <?php echo $data["titre"]?>
                                                    </span>
                                                    <span>
                                                        <?php echo $data["description"]?>
                                                    </span>
                                                </div>
                                                <div class="col-xs-6">
                                                    <span class="like">
                                                        <i class="fa fa-heart-o"></i>
                                                        <?php echo $data["likes"] ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> <!-- end of /.item-description -->
                                    </div> <!-- end of /.portfolio-item -->
                                </div>

                                                                                                                                              

                            
                        <?php $data=mysql_fetch_assoc($sql);}
                        ?>
                        </div>
                        </div> <!-- end of portfolio-item-list -->
                        <?php } ?>

                        
                            
                    
                </section> 
                <!--   end of portfolio section  -->
            
        </div> <!-- end of /#home-page -->

	<?php include "footer.php"; ?>

  </body>
</html>