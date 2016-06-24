<!-- site-navigation start -->  
            <nav id="mainNavigation" class="navbar navbar-dafault main-navigation" role="navigation">
                <div class="container">
                    
                    <div class="navbar-header">
                        
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                        <!-- navbar logo -->
                        <div class="navbar-brand">
                            <span class="sr-only">Youmenie</span>
                            <a href="index.php">
                                <img src="assets/img/main_logo.jpg" class="img-responsive center-block" alt="logo" width="10%">
                            </a>
                        </div>
                        <!-- navbar logo -->

                    </div><!-- /.navbar-header -->

                    <!-- nav links -->
                    <div class="collapse navbar-collapse" id="main-nav-collapse">
                        <ul class="nav navbar-nav navbar-right text-uppercase">
                            <li>
                                <a href="index.php"><span><i class="fa fa-home" aria-hidden="true"></i> Accueil</span></a>
                            </li>

                                                            <?php if(!isset($_SESSION["login_artist"]))
    { ?>        
    <li class="dropdown">
                                <a href="connexion.php" class="dropdown-toggle" data-toggle="dropdown"><span><i class="fa fa-user" aria-hidden="true"></i> Mon compte</span></a>
                                <ul class="dropdown-menu">                  
                                    <li>
                                        <a href="connexion.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Inscription / Connexion</a>
                                    </li>
                                    </ul>  <!-- end of /.dropdown-menu -->
                            </li> <!-- end of /.dropdown -->
                                    
    <?php }else { ?>
        <li class="dropdown">
                                <a href="artiste/mapage.php" class="dropdown-toggle" data-toggle="dropdown"><span><i class="fa fa-user" aria-hidden="true"></i> Mon compte</span></a>
                                <ul class="dropdown-menu">  
                                    <li>
                                        <a href="artiste/mapage.php"><i class="fa fa-file-text" aria-hidden="true"></i> Ma page</a>
                                    </li>
                                    <li>
                                        <a href="artiste/logout.php"><i class="fa fa-power-off" aria-hidden="true"></i> Déconnexion</a>
                                    </li>
                                    </ul>  <!-- end of /.dropdown-menu -->
                            </li> <!-- end of /.dropdown -->
    <?php } ?>
                  

                            <li>
                                <a href="recherche.php"><span><i class="fa fa-search" aria-hidden="true"></i> Recherche</span></a>
                            </li>

                            <li>
                                <a href="annonce.php"><span><i class="fa fa-envelope" aria-hidden="true"></i> Annonces</span></a>
                            </li>
 

                        </ul>
                    </div><!-- nav links -->
                    
                </div><!-- /.container -->
            </nav>
            <!-- site-navigation end -->