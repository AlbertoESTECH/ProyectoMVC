<?php

class commentsController extends Controller
{
    function index()
    {
        require(ROOT . 'Models/Comment.php');

        $comment = new Comment();

        $d['comments'] = $comment->showAllComments();
        $this->set($d);
        $this->render("index");
    }

    function detail($id)
    {
        require(ROOT . 'Models/Comment.php');
        require(ROOT . 'Models/User.php');
        require(ROOT . 'Models/Post.php');

        $comment = new Comment();
        $user = new User();
        $post = new Post();

        $d['comment'] = $comment->showComment($id);
        //Coge el usuario cuyo id sea el de la columna de comments user_id(El usuario que ha publicado el comentario)
        $d['user'] = $user->showUser($comment->showComment($id)["user_id"]);
        //Coge el usuario cuyo id sea el de la columna de posts user_id, del post cuyo id sea el de la columa de post_id de comments(El usuario que publicó el post en el que se ha puesto el comentario)
        $d['user2'] = $user->showUser($post->showPost($comment->showComment($id)["post_id"])["user_id"]);
        $this->set($d);
        $this->render("detail");
    }

    function create()
    {
        require(ROOT . 'Models/User.php');
        require(ROOT . 'Models/Post.php');

        $user = new User();
        $post = new Post();
    
        $d["users"] = $user->showAllUsers();
        $d["posts"] = $post->showAllPosts();
    
        if (isset($_POST["user"]))
        {
            require(ROOT . 'Models/Comment.php');

            $comment = new Comment();

            if ($comment->create($_POST["user"], $_POST["post"], $_POST["body"]))
            {
                header("Location: " . WEBROOT . "comments/index");
            }
        }
        
        $this->set($d);
        $this->render("create");
    }

    function edit($id)
    {
        require(ROOT . 'Models/Comment.php');
        require(ROOT . 'Models/User.php');
        require(ROOT . 'Models/Post.php');

        $user = new User();
        $post = new Post();
        $comment = new Comment();

        $d["users"] = $user->showAllUsers();
        $d["posts"] = $post->showAllPosts();
        $d["comment"] = $comment->showComment($id);

        if (isset($_POST["user"]))
        {
            if ($comment->edit($id, $_POST["user"], $_POST["post"], $_POST["body"]))
            {
                header("Location: " . WEBROOT . "comments/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        require(ROOT . 'Models/Comment.php');

        $comment = new Comment();
        if ($comment->delete($id))
        {
            header("Location: " . WEBROOT . "comments/index");
        }
    }
}
?>