<!--Main Layout-->
<main class="py-5">
<div class="row mt-3 pt-3" >
    <div class="col-md-8">
        <table class="table"id="users">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Compétence(s)</th>
            </tr>
            </thead>
            <tbody class="list">
            <?php 
             debug($users);
                foreach($users as $user){
                    
                    $skills = $user['skills'];
                    echo '<tr><td class="nom">'.$user['nom'].'</td>';
                    echo '<td class="prenom">'.$user['prenom'].'</td>';
                    echo '<td class="competences">';
                    foreach($skills as $skill){
                        echo '<a href="" class="badge badge-cefim">'.$skill.'</a>'; 
                    }
                    echo '</td></tr>';
                }             
            ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-4" data-spy="affix" data-offset-top="100" data-offset-bottom="150">
        <div id="map"></div>
    </div>
</div>

</main>
<!--Main Layout-->
