<?php
if (empty($_SESSION['user'])) {
    ob_start();
    header("Location:?controller=pages&action=home");
    ob_end_flush();
    exit();
}
?>

<section class="container" >
    <div class ="row justify-content-center">
        <div class="col-md-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link <?php echo (isset($_GET['target']) && $_GET['target'] == 'login') ? "active" : ""; ?>" id="loginDetails-tab" data-toggle="pill" href="#loginDetails" role="tab" aria-controls="loginDetails" aria-selected="false">Login Details</a>
                <a class="nav-link" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>

                <?php if ($_SESSION['user']->getAccessLevelID() < 3) { ?>
                    <a class="nav-link <?php echo!isset($_GET['target']) ? "active" : ""; ?>" id="actions-tab" data-toggle="pill" href="#actions" role="tab" aria-controls="actions" aria-selected="false">Actions</a>
                <?php } ?>

                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Favourite Posts</a>
            </div>
        </div>


        <div class="col-md-7">
            <div class="tab-content" id="v-pills-tabContent">


                <!--Login Details Section--> 
                <?php require_once 'loginDetails.php'; ?>



                <!--Profile Section-->
                <?php require 'profile.php'; ?>




                <!--Actions Container-->
                <?php require_once 'actions.php'; ?>



                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="tab-container">




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   



</section>
<script language="javascript">
    function editPost() {
        if (document.querySelector("#edit").style.display === 'none' || document.querySelector("#edit").style.display === '') {
            document.querySelector("#delete").style.display = 'none';
            document.querySelector("#restore").style.display = 'none';
            document.querySelector("#edit").style.display = 'inline';
        } else {
            document.querySelector("#edit").style.display = 'none';
        }
    }
    function deletePost() {
        if (document.querySelector("#delete").style.display === 'none' || document.querySelector("#delete").style.display === '') {
            document.querySelector("#delete").style.display = 'inline';
            document.querySelector("#restore").style.display = 'none';
            document.querySelector("#edit").style.display = 'none';
        } else {
            document.querySelector("#delete").style.display = 'none';
        }
    }
    function restorePost() {
        if (document.querySelector("#restore").style.display === 'none' || document.querySelector("#restore").style.display === '') {
            document.querySelector("#delete").style.display = 'none';
            document.querySelector("#restore").style.display = 'inline';
            document.querySelector("#edit").style.display = 'none';
        } else {
            document.querySelector("#restore").style.display = 'none';
        }
    }
    function showHide(div) {
        x = document.getElementById(div).style;
        if (x.display === 'none' || x.display === '') {
            x.display = 'inline';
        } else {
            x.display = 'none';
        }
    }
</script>