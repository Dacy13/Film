<!--------------      donji footer       -------------------->
<!--	linkovi ka uslovima-->
<div class="container-fluid p-0 m-0 bg-dark" id="footer2">
    <div class="row m-0">
        <!--   levi div-->
        <div class="col-sm">
            <div class="nav justify-content-center text-white">
                <label class=""></label> 
            </div>
        </div>
        <!--    centralni div-->
        <div class="col-sm">
            <ul class="nav justify-content-center bg-dark text-white">
                <li class="nav-item"> <a class="nav-link text-secondary" href="#">Aleksandar</a> </li>
            </ul>
        </div>
        <!--    desni div-->
        <div class="col-sm">
            <!--					social			-->
            <ul class="nav justify-content-center bg-dark text-white">
                <li class="nav-item">
<!--                    <a class="nav-link" href=""> <img src="icons/face.png" alt=""> </a>-->
                </li>
                <li class="nav-item">
<!--                    <a class="nav-link" href="#"> <img src="icons/insta.png" alt=""> </a>-->
                </li>
                <li class="nav-item">
<!--                    <a class="nav-link" href="#"> <img src="icons/twit.png" alt=""> </a>-->
                </li>
            </ul>
            <!--		end social-->
        </div>
    </div>
</div>

</div>

<!--   skripta za riloud modela prilikom loseg upisa podataka  -->
<?php if (!empty($poruka)) { ?>

    <script type="text/javascript">
        $(window).on('load', function () {
            $('#ReggModalCenter').modal('show');
        });
    </script>

<?php } ?>
</body>

</html>
