<?php

class postsController extends Controller
{
    function index()
    {
        require(ROOT . 'Models/Post.php');

        $post = new Post();

        $d['posts'] = $post->showAllPosts();
        $this->set($d);
        $this->render("index");
    }

    function delete($id)
    {
        require(ROOT . 'Models/Post.php');
        require(ROOT . 'Models/Comment.php');

        $comment = new Comment();
        if($comment->deleteAllCommentsFromPost($id)) {
            $post = new Post();
            if ($post->delete($id))
            {
                header("Location: " . WEBROOT . "posts/index");
            } else {
                header("Location: " . WEBROOT . "error");
            }
        }
    }
}
?>