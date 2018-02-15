<main class="py-5">
    <div class="row mt-3 pt-3 mb-perso" id="comp">

        <table class="table">
            <thead>
            <tr>
                <th class="sort" data-sort="competence" style="min-width: 10vw">Compétence</th>
               <th class="sort" data-sort="children" style="min-width: 10vw">Compétences associées</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="list">
            <?php 
                foreach($skill_liste as $s){
                    echo '<tr><td class="competence"><a href="" class="badge badge-cefim bagde-list-cefim">'.$s['nom'].'</td></a>';
                    echo '<td class="children">';
                    $children = getChildrenCompetence($s['id'], $comp_model);
                    if(!empty($children)){
                        foreach($children as $child){
                            echo '<a href="" class="badge badge-cefim bagde-list-cefim" data-id="'.$child['id'].'">'.$child['nom'].'</a>'; 
                        }
                    }
                    echo '</td><td class="actions">';
                    echo '<button type="button" class="btn btn-sm btn-amber" id="deleteSkill" data-id="'.$s['id'] .'"><i class="fa fa-trash" style="font-size:24px;"></i></button>';
                    echo '</td></tr>';
                }             
                ?>
               
            </tbody>

        </table>
        
        <div class = "row containerPaginationComp mb-5">
            <nav class = "text-center">
                <ul class='pagination pagination-circle pg-amber mb-0'></ul>
            </nav>
        </div>

    </div>

    <div class="modal fade form" role="dialog" aria-labelledby="test" aria-hidden="true">
        <div class="modal-dialog modal-lg"></div>
    </div>


</main>

