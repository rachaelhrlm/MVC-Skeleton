<?php

class PostController {

    public function searchAll() {
        $posts = Post::searchAll();
        require_once('views/posts/searchAll.php');
    }

    public function searchID() {
        if (!isset($_GET['id']))
            return call('pages', 'error');
        try {
            $post = Post::searchID($_GET['id']);
            $socials = Post::searchSocial($post->getMemberID());
            require_once('views/posts/read.php');
        } catch (Exception $ex) {
            return call('pages', 'error');
        }
    }

    public function edit() {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset($_GET['id']))
                return call('pages', 'error');

            
            $post = Post::searchID($_GET['id']);
            $categories = Post::categories();
            require_once('views/posts/edit.php');
        }
        else {
            $id = $_GET['id'];
            Post::edit($id);
            
            $post = Post::searchID($_GET['id']);
            $socials = Post::searchSocial($post->getMemberID());
            require_once('views/posts/read.php');
        }
    }

     public function update() {
        
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
          if (!isset($_GET['id']))
        return call('pages', 'error');


        $post = Post::find($_GET['id']);
      
        require_once('views/posts/update.php');
        }
      else
          { 
            $id = $_GET['id'];
            Post::update($id);
                        
            $posts = Post::all();
            require_once('views/posts/readAll.php');
      }
      
    }
    
    
    public function test() {
      $categories = Post::categories();  
      require_once('views/posts/test.php');

    }

}
