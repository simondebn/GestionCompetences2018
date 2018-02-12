<!--Main Layout-->
<main class="py-5">

    <?php if(isset($_SESSION['compte_admin']) && $_SESSION['compte_admin']): ?>
        <div id="is_admin" class="hide"></div>
    <?php endif; ?>

    <div class="row mt-3 pt-3">
    <div class="col-md-8">

        <table class="table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Compétence(s)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td><a href="" class="badge badge-cefim">Angular</a><a href="" class="badge badge-cefim">Bootstrap</a><a href="" class="badge badge-cefim">Symphony</a></td>
            </tr>
            <tr>
                <td>Jacob</td>
                <td>Thornton</td>
                <td><a href="" class="badge badge-cefim">Angular</a><a href="" class="badge badge-cefim">C#</a><a href="" class="badge badge-cefim">C++</a><a href="" class="badge badge-cefim">C</a><a href="" class="badge badge-cefim">TFS</a></td>
            </tr>
            <tr>
                <td>Larry</td>
                <td>the Bird</td>
                <td><a href="" class="badge badge-cefim">PHP</a><a href="" class="badge badge-cefim">HTML</a><a href="" class="badge badge-cefim">CSS</a></td>
            </tr>            <tr>
                <td>Larry</td>
                <td>the Bird</td>
                <td><a href="" class="badge badge-cefim">PHP</a><a href="" class="badge badge-cefim">HTML</a><a href="" class="badge badge-cefim">CSS</a></td>
            </tr>            <tr>
                <td>Larry</td>
                <td>the Bird</td>
                <td><a href="" class="badge badge-cefim">PHP</a><a href="" class="badge badge-cefim">HTML</a><a href="" class="badge badge-cefim">CSS</a></td>
            </tr>            <tr>
                <td>Larry</td>
                <td>the Bird</td>
                <td><a href="" class="badge badge-cefim">PHP</a><a href="" class="badge badge-cefim">HTML</a><a href="" class="badge badge-cefim">CSS</a></td>
            </tr>            <tr>
                <td>Larry</td>
                <td>the Bird</td>
                <td><a href="" class="badge badge-cefim">PHP</a><a href="" class="badge badge-cefim">HTML</a><a href="" class="badge badge-cefim">CSS</a></td>
            </tr>            <tr>
                <td>Larry</td>
                <td>the Bird</td>
                <td><a href="" class="badge badge-cefim">PHP</a><a href="" class="badge badge-cefim">HTML</a><a href="" class="badge badge-cefim">CSS</a></td>
            </tr>            <tr>
                <td>Larry</td>
                <td>the Bird</td>
                <td><a href="" class="badge badge-cefim">PHP</a><a href="" class="badge badge-cefim">HTML</a><a href="" class="badge badge-cefim">CSS</a></td>
            </tr>            <tr>
                <td>Larry</td>
                <td>the Bird</td>
                <td><a href="" class="badge badge-cefim">PHP</a><a href="" class="badge badge-cefim">HTML</a><a href="" class="badge badge-cefim">CSS</a></td>
            </tr>
            </tbody>
        </table>

    </div>
    <div class="col-md-4" data-spy="affix" data-offset-top="100" data-offset-bottom="150">
        <div id="map"></div>
    </div>
</div>

    <div class="modal fade form" role="dialog" aria-labelledby="test" aria-hidden="true">
        <div class="modal-dialog modal-lg"></div>
    </div>


</main>
<!--Main Layout-->
