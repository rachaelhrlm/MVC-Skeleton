
<div class="tab-pane fade <?php echo (!isset($_GET['target']) && $_SESSION['user']->getAccessLevelID() == 3) ? "show active" : ""; ?>" id="favourites" role="tabpanel" aria-labelledby="favourites-tab">

    <div class="tab-container">

        <div class="row justify-content-center">
            <i class="far fa-heart fa-3x icon"></i><h1>Favourites </h1>
        </div>
        <div class="row justify-content-center">
            <?php
            foreach ($favs as $fav) {
                foreach ($favposts as $post) {
                    if ($fav['postID'] === $post['postID']) {
                        $img = "views/images/{$post['postID']}.jpeg";
                        ?>
                        <div class="card customcard" onclick="location.href = '?controller=post&action=searchID&id=<?php echo $post['postID']; ?>';" style="width: 15rem;">
                            <img src="<?php echo $img ?>"  class="card-img-top">
                            <div class="card-body">
                                <p class="card-text"><small class="text-muted"><?php echo $post['datePosted'] . '&emsp; &emsp;' . $post['author'] ?></small></p>
                                <h5 class="card-title"><?php echo ucwords(Post::censor($post['title'])) ?></h5>
                                <button><?php echo $post['category'] ?></button>
                            </div>
                        </div>



                        <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</div>