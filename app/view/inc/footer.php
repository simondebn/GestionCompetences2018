</div>
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="public/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="public/js/bootstrap.min.js"></script>
<!-- Bootstrap notify -->
<script type="text/javascript" src="public/js/bootstrap-notify.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="public/js/mdb.min.js"></script>
<!-- List.js -->
<script type="text/javascript" src="public/js/list.js"></script>
<!-- Affix.js -->
<script type="text/javascript" src="public/js/affix.js"></script>
<!-- markerclusterer.js -->
<script type="text/javascript" src="public/js/markerclusterer.js"></script>
<!-- Google Maps API Javascript -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD81_FT1orBqGjrKUoq6H9LFIEvyZfiXOU&callback=initMap"
        async defer></script>
<!-- auto-complete  -->
<script type="text/javascript" src="public/js/auto-complete.min.js"></script>


<script type="text/javascript" src="public/js/modal.js"></script>
<script type="text/javascript" src="public/js/googleMaps.js"></script>
<script type="text/javascript" src="public/js/script.js"></script>

</body>
<!--Footer-->
<footer class="page-footer footer-color center-on-small-only" style="padding-top: 80px;">

    <!--Footer Links-->
     <div class="container">
        <div class="row">
            <div class="col-md-6" style="margin-bottom: 2%">
                <h5 class="title">Tags</h5>
                <?php
                    foreach($tags as $tag){
                       echo '<a href="" class="badge badge-cefim bagde-list-cefim">'.$tag['nom'].'</a>';
                    }      
                ?>
            </div>
        </div>
    </div>

    <!--Copyright-->
    <div class="footer-copyright">
        <div class="container-fluid">
            © 2018 Copyright: <a href="https://www.cefim.eu"> Wittgenstein</a>

        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->

</html>