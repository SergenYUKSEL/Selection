    <header>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
            <div class="container"><a class="navbar-brand" href="#">S11</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav">
                        <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
                           echo '<li class="nav-item"><a class="nav-link" href="#">'. $_SESSION['lastname']  ."  ".  $_SESSION['firstname'] .  '</a></li>';
                        } ?>
                        <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'administrator') {
                           echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"admin.php\">Accueil</a></li>";
                        }
                        else if(isset($_SESSION['role']) && $_SESSION['role'] === 'teacher') {
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"teacher.php\">Accueil</a></li>";
                         }
                        else if(isset($_SESSION['role']) && $_SESSION['role'] === 'secretary') {
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"secretary.php\">Accueil</a></li>";
                         }
                        else if(!isset($_SESSION['logged'])) {
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php\">Se connecter</a></li>";
                         }  ?>
                            
                        <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'administrator') {
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"listAccounts.php\">Liste des comptes</a></li>";
                            }  
                            else if(isset($_SESSION['role']) && $_SESSION['role'] === 'teacher') {
                                echo '<li class="nav-item"><a class="nav-link" href="listGrid.php?req=1" ">Liste des étudiants inscrits</a></li>';
                                }
                            else if(isset($_SESSION['role']) && $_SESSION['role'] === 'secretary') {
                                echo '<li class="nav-item"><a class="nav-link" href="listGrid.php?req=1">Liste des étudiants inscrits</a></li>';
                                } ?>
                        
                        <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'administrator') {
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"createAccount.php\">Création d'un compte</a></li>";
                            }  
                            else if(isset($_SESSION['role']) && $_SESSION['role'] === 'teacher') {
                                echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"grid.php\">Remplir une grille</a></li>";
                                } ?>
                        <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
                           echo '<li class="nav-item"><a class="nav-link" href="activate_doubleauth.php">Double Authentification</a></li>';
                        } ?>
                    </ul>
                    <form class="me-auto search-form" target="_self">
                        <div class="d-flex align-items-center"></div>
                    </form>
                    <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
                     echo "<a class=\"btn btn-light action-button\" role=\"button\" href=\"logout.php\">Se déconnecter</a>";
                     } ?>
                     
                </div>
            </div>
        </nav>
    </header>
