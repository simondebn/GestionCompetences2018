<!--Main Layout-->
<main class="py-5">
    <?php if(isset($_SESSION['compte_admin']) && $_SESSION['compte_admin']): ?>
        <div id="is_admin" class="hide"></div>
    <?php endif; ?>
    <?php if(isset($_SESSION['open_modal']) && $_SESSION['open_modal']): ?>
        <div id="open_modal" class="hide"></div>
    <?php endif; ?>

    <div class="row mt-3 pt-3">
    <div class="col-md-8 " id="users">
        <?php if(isset($recherche) && $recherche != null){ echo "<p align='center' style='padding-top:5px'>Résultat de la recherche pour '<b id='search_test'>$recherche</b>'.</p>"; } ?>
        <table class="table">
            <thead>
            <tr>
                <th class="sort" data-sort="nom" style="min-width: 10vw">Nom</th>
                <th class="sort" data-sort="prenom" style="min-width: 10vw">Prénom</th>
                <th>Compétence(s)</th>
            </tr>
            </thead>
            <tbody class="list">
            <?php 
                foreach($users as $user){
                    $user_skills = $user['skills'];
                    echo '<tr data-id="'. $user['id'] .'"><td class="nom">'.$user['nom'].'</td>';
                    echo '<td class="prenom">'.$user['prenom'].'</td>';
                    echo '<td class="competences">';
                    foreach($user_skills as $user_skill){
                        echo '<a href="" class="badge badge-cefim bagde-list-cefim">'.$user_skill.'</a>';
                    }
                    echo '</td></tr>';
                }             
            ?>
            </tbody>
        </table>

        <div class = "row containerPagination">
            <nav class = "text-center">
                <ul class='pagination pagination-circle pg-amber mb-0'></ul>
            </nav>
        </div>

    </div>
    <div class="col-md-4" data-spy="affix" data-offset-top="100">
        <div id="map"></div>
    </div>
</div>

    <div class="modal fade form" role="dialog" aria-labelledby="test" aria-hidden="true">
        <div class="modal-dialog modal-lg"></div>
    </div>


</main>
<!--Main Layout-->
