<!--If image file with name of ID number exists, store it into the $img variable, else use a default image-->
<?php
if (file_exists("views/images/{$_GET['id']}.jpeg")) {
    $img = "views/images/{$_GET['id']}.jpeg";
} else {
    $img = "views/images/standard/_noproductimage.png";
}

if (file_exists("views/images/members/{$post->getMemberID()}.jpeg")) {
    $pic = "views/images/{$post->getMemberID()}.jpeg";
} else {
    $pic = "views/images/standard/noprofileimage.png";
}
?>


<!--if user is logged in and accessLevelID is admin or member logged in is the post author-->
<?php
if (isset($_SESSION['user']) &&
        (($_SESSION['user']->getAccessLevelID() === '1') || ($post->getMemberID() === $_SESSION['user']->getMemberID()))) {
    ?>






    <div class="spacer"></div>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-9 text-right">
                <a href="?controller=post&action=edit&id=<?php echo $post->getPostID(); ?>"><i class="fas fa-pen-square fa-3x icon" data-toggle="tooltip" data-placement="top" title="Edit Post"></i></a>
                <a href="?controller=post&action=create"><i class="fas fa-plus-square fa-3x icon" data-toggle="tooltip" data-placement="top" title="New Post"></i></a>
                <a href=""><i class="fas fa-minus-square fa-3x icon" data-toggle="tooltip" data-placement="top" title="Delete Post"></i></a>
                <hr>
            </div>
        </div>
    </div>
<?php } ?>






<!--Blog Content-->
<section class="container">    
    <div class ="row justify-content-center">
        <div class="col-md-9 text-center"> 
            <h1><?php echo ucwords(str_replace(Post::Curses, '<i class="curses"> meow</i>', strtolower($post->getTitle()))) ?></h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <small class="text-muted"><?php echo $post->getAuthor() . '&emsp; &emsp;' . $post->getDatePosted() . '&emsp; &emsp;' . $post->getCategory() ?></small>
    </div>


    <!--Add to Any Share Buttons-->
    <div class="row justify-content-center">
        <div class="a2a_kit a2a_kit_size_32 a2a_default_style sharebtn">
            <a class="a2a_button_email"></a>
            <a class="a2a_button_print"></a>
            <a class="a2a_button_twitter"></a>
            <a class="a2a_button_linkedin"></a>
            <a class="a2a_button_facebook"></a>
            <a class="a2a_button_tumblr"></a>
        </div>
    </div>



    <div class="row justify-content-center">
        <div class="col-md-9 text-center">
            <img src="<?php echo $img ?>?<?= Date('U') ?>" class="blogimg">
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-9 post">
            <h2 class="excerpt"><?php echo ucwords(str_replace(Post::Curses, '<i class="curses"> meow</i>',$post->getExcerpt())) ?></h2>
            <div class="spacer"></div>
            <?php 
            
            $content = str_replace(Post::Curses, '<i class="curses">meow</i>', htmlspecialchars_decode($post->getContent()));
            
            echo  $content?>
        </div>
    </div>
</section>






<!--Author Snippet-->
<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-9 authorSnippet">
            <div class="row justify-content-around">
                <div class="col-md-3">
                    <img src="<?php echo $pic ?>" class="profilePic">
                    <p><?php echo $post->getAuthor() ?></p>
                </div>
                <div class="col-md-6 text-left">
                    <h2>About the author:</h2>
                    <p><?php echo $post->getAbout() ?></p>

                    <?php
                    foreach ($socials as $social) {
                        if ($social['socialID'] === '1') {
                            ?>
                            <a href="<?php echo $social['url'] ?>"> <i class="fab fa-twitter fa-2x icon"></i></a>
                            <?php
                        }
                        if ($social['socialID'] === '2') {
                            ?>
                            <a href="<?php echo $social['url'] ?>"> <i class="fab fa-facebook fa-2x icon"></i></a>
                            <?php
                        }
                        if ($social['socialID'] === '3') {
                            ?>
                            <a href="<?php echo $social['url'] ?>"> <i class="fab fa-github fa-2x icon"></i>  </a> 
                            <?php
                        }
                        if ($social['socialID'] === '4') {
                            ?>
                            <a href="<?php echo $social['url'] ?>"> <i class="fab fa-instagram fa-2x icon"></i> </a>
                            <?php
                        }
                        if ($social['socialID'] === '5') {
                            ?>
                            <a href="<?php echo $social['url'] ?>"> <i class="fab fa-linkedin fa-2x icon"></i></a>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
</section>








<!--Previous and Next Post-->
<section class="container">
    <div class="row justify-content-around">
        <div class="col-md-4">
            <?php
            $prevID = $_GET['id'] - 1;
            $prev = Post::searchID($prevID);
            if (!empty($prev)) {
                $previmg = "views/images/{$prevID}.jpeg";
                ?>
                <div class="row justify-content-center">
                    <h3>Previous Post</h3>
                </div>
                <div class="card customcard" onclick="location.href = '?controller=post&action=searchID&id=<?php echo $prev->getPostID(); ?>';" style="width: 20rem;">
                    <img src="<?php echo $previmg ?>"  class="card-img-top">
                    <div class="card-body">
                        <p class="card-text"><small class="text-muted"><?php echo $prev->getDatePosted() . '&emsp; &emsp;' . $prev->getAuthor() ?></small></p>
                        <h5 class="card-title"><?php echo ucwords(str_replace(Post::Curses, '<i class="curses"> meow</i>', strtolower($prev->getTitle()))) ?></h5>
                        <p class="card-text"><?php echo ucwords(str_replace(Post::Curses, '<i class="curses"> meow</i>', strtolower($prev->getExcerpt()))) ?></p>
                        <button><?php echo $prev->getCategory() ?></button>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="col-md-4">
            <?php
            $nextID = $_GET['id'] + 1;
            $next = Post::searchID($nextID);
            if (!empty($next)) {
                $nextimg = "views/images/{$nextID}.jpeg";
                ?>
                <div class="row justify-content-center">
                    <h3>Next Post</h3>
                </div>
                <div class="card customcard" onclick="location.href = '?controller=post&action=searchID&id=<?php echo $next->getPostID(); ?>';" style="width: 20rem;">
                    <img src="<?php echo $nextimg ?>"  class="card-img-top" >
                    <div class="card-body">
                        <p class="card-text"><small class="text-muted"><?php echo $next->getDatePosted() . '&emsp; &emsp;' . $next->getAuthor() ?></small></p>
                        <h5 class="card-title"><?php echo ucwords(str_replace(Post::Curses, '<i class="curses"> meow</i>', strtolower($next->getTitle()))) ?></h5>
                        <p class="card-text"><?php echo ucwords(str_replace(Post::Curses, '<i class="curses"> meow</i>', strtolower($next->getExcerpt()))) ?></p>
                        <button><?php echo $next->getCategory() ?></button>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

