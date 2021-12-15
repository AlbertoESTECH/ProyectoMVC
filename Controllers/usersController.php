<?php

class usersController extends Controller
{
    function index()
    {
        require(ROOT . 'Models/User.php');

        $user = new User();

        $d['users'] = $user->showAllUsers();
        $this->set($d);
        $this->render("index");
    }

    function detail($id)
    {
        require(ROOT . 'Models/User.php');

        $user = new User();

        $d['user'] = $user->showUser($id);
        $this->set($d);
        $this->render("detail");
    }

    function create()
    {
        if (isset($_POST["name"]))
        {
            require(ROOT . 'Models/User.php');

            $user = new User();

            if ($user->create($_POST["name"], $_POST["email"], $_POST["password"]))
            {
                header("Location: " . WEBROOT . "users/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        require(ROOT . 'Models/User.php');
        $user= new User();

        $d["users"] = $user->showUser($id);

        if (isset($_POST["name"]))
        {
            if ($user->edit($id, $_POST["name"], $_POST["email"], $_POST["password"]))
            {
                header("Location: " . WEBROOT . "users/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        require(ROOT . 'Models/User.php');
        require(ROOT . 'Models/Comment.php');
        require(ROOT . 'Models/Post.php');

        //Primero borra todos sus comentarios, después todos los comentarios de sus posts, luego sus posts y por último a él.
        $comment = new Comment();
        if ($comment->deleteAllCommentsFromUser($id)) {
            if($comment->deleteAllCommentsFromPostFromUser($id)) {
                $post = new Post();
                if($post->deleteAllPostsFromUser($id)) {
                    $user = new User();
                    if ($user->delete($id)){
                        header("Location: " . WEBROOT . "users/index");
                        
                    } else {
                        header("Location: " . WEBROOT . "error");
                    }
                } else {
                    header("Location: " . WEBROOT . "error");
                }
            } else {
                header("Location: " . WEBROOT . "error");
            }
        } else {
            header("Location: " . WEBROOT . "error");
        }
    }

    function error($m){
        $d["error"] = $m;
        $this->set($d);
        $this->render("error");
    }
}
?>