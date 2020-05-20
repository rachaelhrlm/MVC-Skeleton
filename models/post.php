<?php

class Post {

//    attributes
    private $postID;
    private $memberID;
    private $categoryID;
    private $title;
    private $author;
    private $category;
    private $datePosted;
    private $dateUpdated;
    private $excerpt;
    private $content;

//    constructor
    public function __construct($postID, $memberID, $categoryID, $title, $author, $category, $datePosted, $dateUpdated, $excerpt, $content) {
        $this->postID = $postID;
        $this->memberID = $memberID;
        $this->categoryID = $categoryID;
        $this->title = $title;
        $this->author = $author;
        $this->category = $category;
        $this->datePosted = $datePosted;
        $this->dateUpdated = $dateUpdated;
        $this->excerpt = $excerpt;
        $this->content = $content;
    }

//    getters
    public function getPostID() {
        return $this->postID;
    }

    public function getMemberID() {
        return $this->memberID;
    }

    public function getCategoryID() {
        return $this->categoryID;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getDatePosted() {
        return $this->datePosted;
    }

    public function getDateUpdated() {
        return $this->dateUpdated;
    }

    public function getExcerpt() {
        return $this->excerpt;
    }

    public function getContent() {
        return $this->content;
    }

    //    setters
    public function setPostID($postID) {
        $this->postID = $postID;
    }

    public function setMemberID($memberID) {
        $this->memberID = $memberID;
    }

    public function setCategoryID($categoryID) {
        $this->categoryID = $categoryID;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function setDatePosted($datePosted) {
        $this->datePosted = $datePosted;
    }

    public function setDateUpdated($dateUpdated) {
        $this->dateUpdated = $dateUpdated;
    }

    public function setExcerpt($excerpt) {
        $this->excerpt = $excerpt;
    }

    public function setContent($content) {
        $this->content = $content;
    }

//    method for selecting all posts
    public static function searchAll() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM postInfo ORDER BY postID DESC');
        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['postID'], $post['memberID'], $post['categoryID'], $post['title'], $post['author'], $post['category'], $post['datePosted'], $post['dateUpdated'], $post['excerpt'], $post['content']);
        }
        return $list;
    }

    
//    method for selecting post via Ajax where keyword matches anything
    public static function searchAny($keyword) {
        $db = Db::getInstance();
        $req = $db->prepare('CALL searchPost(?)');
        $req->execute([$keyword]);
        $posts = $req->fetchAll(PDO::FETCH_ASSOC); //specifying that I want the results to be associative arrays
        if (!empty($posts)) { //if there are results, echo out a container along with a loop of Post Cards
            echo '<div class="container"><div class="row justify-content-center">';
            foreach ($posts as $post) {
                $img = "views/images/{$post['postID']}.jpeg";
                echo '<div class="card customcard" onclick="location.href = ' . "'?controller=post&action=searchID&id=" . $post['postID'] . "'" . '"' . '; style="width: 20rem;">';
                echo '<img src="' . $img . '"  class="card-img-top" alt="Image for ' . $post['title'] . '">';
                echo '<div class="card-body">';
                echo '<p class="card-text"><small class="text-muted">' . $post['datePosted'] . '&emsp; &emsp;' . $post['author'] . '</small></p>';
                echo '<h5 class="card-title">' . $post['title'] . '</h5>';
                echo '<p class="card-text">' . $post['excerpt'] . '</p>';
                echo '<button>' . $post['category'] . '</button>';
                echo '</div></div>';
            }
            echo '</div></div>';
        } else { //if there are no results, echo 'No results found.'
            echo 'No results found.';
        }
    }
    
    
    public static function searchID($id) {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM postinfo WHERE postID = :id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
        $post = $req->fetch();
        if (!empty($post)) {
            return new Post($post['postID'], $post['memberID'], $post['categoryID'], $post['title'], $post['author'], $post['category'], $post['datePosted'], $post['dateUpdated'], $post['excerpt'], $post['content']);
        } else {
            return $post = NULL;
        }
    }
}