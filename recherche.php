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

    </head>

    <body>
		<!-- Ajout du HEADER -->
		<?php include "header.php"; ?>
		
		<section style="background:#EBF0F8;" id="search-page">
			<form method="post" action="" class="form-inline"> 
				<div class="form-group">
					&nbsp;&nbsp;&nbsp;&nbsp;
					<label>Titre ou Description</label>
					<input class="form-control" type="text" name="tag" >
					
				</div>	
				<div class="form-group">
				<label class="radio-inline">	
					<input type="radio" name="type" value="Textes" required >Textes
				</label>
				<label class="radio-inline">
					<input type="radio" name="type" value="Musiques" required >Musiques
				</label>
				<label class="radio-inline">
					<input type="radio" name="type" value="Videos" required >Videos
				</label>
				<label class="radio-inline">
					<input type="radio" name="type" value="Images" required >Images
				</label>
				<label class="radio-inline">
					<input type="radio" name="type" value="All" required >Tout
				</label>
				</div>
				<div class="form-group">
					
					<input style="margin-left:15px;" class="btn btn-primary" type="submit" value="Chercher"name="search">
					
				</div>
			</form>

			<br><br><br>
			

			<?php
				if(!isset($_POST['search']))
				{
					echo "<div style='padding:200px;background:#EBF0F8;'> </div>";
				}
				else
				{
					$tag = $_POST['tag'];
					$type = $_POST['type'];
					if($type !='All')
					{
						$req = "SELECT * FROM oeuvres WHERE (titre LIKE '%$tag%' OR description LIKE '%$tag%') AND type='$type' ";
					}
					else
					{
						$req = "SELECT * FROM oeuvres WHERE titre LIKE '%$tag%' OR description LIKE '%$tag%' ";
					}
					
							$sql=mysql_query($req);
							if(mysql_num_rows($sql)<1)
							{
								echo "<center><h2>aucune oeuvre correspond à votre recherche.</h2></center>";
							}
							else 
							{ 
								$data = mysql_fetch_assoc($sql);
								?>
								<div class="portfolio-item-list">
									<div class="row">
									 <?php
										while($data)
										{  ?>                     
											<!-- Affichage oeuvre -->
											<div style="margin-left:15px;" class="col-md-4 col-sm-6">
												<div class="portfolio-item">
													<div class="item-image">
														<a href="artiste/oeuvre.php?ID=<?php echo $data["id"] ?>">
														<?php $art = "artiste/"; ?>
															<img src="<?php echo $art;?><?php echo $data["icone"]?>" class="img-responsive center-block" alt="portfolio 1">
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
											<?php $data=mysql_fetch_assoc($sql); 
										}  ?>
									</div>
								</div> <!-- end of portfolio-item-list -->
								<?php
							} 
				} ?>
		</section>
		<?php include "footer.php"; ?>	
  </body>
</html>