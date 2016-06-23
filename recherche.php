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
        <link rel="icon" type="image/png" href="img/main_logo.jpg">
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
		
		<section id="search-page">
			<form method="post" action="" > 
			<table>
				<tr>
					<td> Titre ou Description </td>
					<td><input type="text" name="tag" > </td><td><input type="submit" value="Chercher"name="search">
					</td>
				</tr>
				<tr>
					<td><input type="radio" name="type" value="Textes" required >Textes</td>
					<td><input type="radio" name="type" value="Musiques" required >Musiques</td>
					<td><input type="radio" name="type" value="Videos" required >Videos</td>
					<td><input type="radio" name="type" value="Images" required >Images</td>
					<td><input type="radio" name="type" value="All" required >Tout</td>
				</tr>
			</table>
			</form>
			
			<?php
				if(!isset($_POST['search']))
				{
					echo "<div style='padding:200px;background:yellow;'> </div>";
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
											<div class="col-md-4 col-sm-6">
												<div class="portfolio-item">
													<div class="item-image">
														<a href="oeuvre.php?ID=<?php echo $data["id"] ?>">
															<img src="<?php echo $data["icone"]?>" class="img-responsive center-block" alt="portfolio 1">
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