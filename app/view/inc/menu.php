<header>

    <?php if(isset($_SESSION['user_id'])): ?>

        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-cefim scrolling-navbar">
            <a class="navbar-brand" href="main"><strong>CEFIM</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse ml-lg-perso" id="navbarSupportedContent">
                <!-- Search form -->
                <form class="form-inline md-form mr-auto mb-1" id="form_search">
                    <input class="form-control w-75 mr-3" type="text" placeholder="Rechercher" aria-label="Search" id="search">
                    <i class="fa fa-search text-white" aria-hidden="true" id="search_button"></i>
                </form>
                <ul class="navbar-nav">
                    <?php if(isset($_SESSION['compte_admin']) && $_SESSION['compte_admin']): ?>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" href="competences">Liste des compétences</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" href="#" id="addPersonne">Ajouter un utilisateur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light disabled" href="#">Import csv</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" href="#" id="modifyPersonne">Modifier son profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" href="#" id="deconnexion">Déconnexion</a>
                        </li>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['compte_admin']) && ! $_SESSION['compte_admin']): ?>
                        <li class="nav-item active">
                            <a class="nav-link waves-effect waves-light" href="#" id="modifyPersonne">Modifier son profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" href="#" id="deconnexion">Déconnexion</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    <?php endif; ?>

</header>
<div class="container">