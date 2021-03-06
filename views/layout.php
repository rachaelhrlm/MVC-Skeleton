<!DOCTYPE html>
<?php
require_once 'models/member.php';
session_start();
?>
<html>
    <head>
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--bootstrap stylesheet-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!--fontawesome stylesheet: for icons-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <!--custom style sheet-->

        <link href="views/css/loginform.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="views/css/styles.css" type="text/css">
        <link href="views/css/buttons.css" rel="stylesheet" type="text/css"/>

        <title>Concatenate</title>
    </head>


    <body>
        <i class="fas fa-chevron-circle-up fa-3x icon" onclick="topFunction()" id="scrollup"></i>





        <!--Navbar Switch-->
        <?php
        require_once 'views/sections/nav-default.php';
        ?>






        <hr>




        <!--Content-->
        <?php require_once('routes.php'); ?>




        <hr>
        <div class='container-fluid'id='subscribe'>
            <div class="container">

            <div class='row justify-content-center'>


                <form class='form-inline' method="POST" action='?controller=member&action=subscribe<?php if (isset($_GET['id'])){ echo "&id={$_GET['id']}";} ?>'>
                    <h3>Subscribe: </h3>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="email" name='email' required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Submit</button>
                        </div>
                    </div>




                </form>
            </div>
            </div>
        </div>



        <!--divider-->
        <hr>
        <!--Footer-->
        <div id="footer">
            <div class="container-fluid footer">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-2 logoContainer">
                            <div class="row">
                                <img class="logo" src="views/images/standard/logo.png">
                                <!--<div class="circle"></div>-->
                            </div>
                        </div>
                        <div class="col-md-3">
                            <ul>
                                <li> <h5> <i class="fas fa-circle footcircle"></i>Founders</h5> </li>
                                <!--<li><hr></li>-->
                                <li>Ruth</li>
                                <li>Sarah</li>
                                <li>Rachael</li>
                                <li>Yaqi</li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul>
                                <li> <h5> <i class="fas fa-circle footcircle"></i>Contact</h5> </li>
                                <!--<li><hr></li>-->
                                <li>Example</li>
                                <li>Example</li>
                                <li>Example</li>
                                <li>Example</li>
                            </ul>

                        </div>
                        <div class="col-md-3">
                            <ul>
                                <li><h5><i class="fas fa-circle footcircle"></i>Socials</h5></li>
                                <!--<li><hr></li>-->
                                <i class="fab fa-discord fa-2x"></i><i class="fab fa-facebook fa-2x"></i><i class="fab fa-github fa-2x"></i>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>

            <hr class="footer">


            <div class="container-fluid footer">
                <div class="row justify-content-end align-content-middle">
                    <div class="col-md-2">
                        <img src="views/images/standard/logo-graphic.png" width="30px">
                        <i class="far fa-copyright"></i> <?php echo date('Y') ?></div>

                </div>
            </div>
        </div>

        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
        <script src='https://cdn.tiny.cloud/1/tsm4jflxmwzdk9w9ws3pt5kefzwep82nt1bcq1rduh7w70lu/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script>

            function showHide(div) {
                x = document.getElementById(div).style;
                if (x.display === 'none' || x.display === '') {
                    x.display = 'flex';
                } else {
                    x.display = 'none';
                }
            }
//            Enable tinymce Text Formatting 
            tinymce.init({
                selector: '.textarea',
                plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
                toolbar_mode: 'floating',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
            });
//            Enable Bootstrap ToolTip
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })


//            Select Bootstraps custom-file-input class and when something changes, 
//            get the file name of the input with the image id and give that name
//            to the next element sibling. (Quick Fix to Bootstrap hiding filename issue)
            document.querySelector('.custom-file-input').addEventListener('change', function (e) {
                var fileName = document.getElementById("image").files[0].name;
                var nextSibling = e.target.nextElementSibling
                nextSibling.innerText = fileName
            })



            var scrollup = document.getElementById("scrollup");
            window.onscroll = function () {
                scrollFunction();
            };

            function scrollFunction() {
                if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                    scrollup.style.display = "block";
                } else {
                    scrollup.style.display = "none";
                }
            }



            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }


        </script>
        <script async src="https://static.addtoany.com/menu/page.js"></script>
    </body>
</html>