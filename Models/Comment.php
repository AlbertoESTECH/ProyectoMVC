<?php
class Comment extends Model
{
    public function create($user_id, $post_id, $body)
    {
        $sql = "INSERT INTO comments (user_id, post_id, body, created_at, updated_at) VALUES (:user_id, :post_id, :body, :created_at, :updated_at)";
        try{
            $req = Database::getBdd()->prepare($sql);
            return $req->execute([
                'user_id' => $user_id,
                'post_id' => $post_id,
                'body' => $body,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        catch(PDOException $e){
            print_r($e->getMessage());
        }
    }

    public function showComment($id)
    {
        $sql = "SELECT * FROM comments WHERE id =" . $id;
        try{
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            return $req->fetch();
        }
        catch(PDOException $e){
            print_r($e->getMessage());
        }
    }

    public function showAllComments()
    {
        $sql = "SELECT * FROM comments";
        try{
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            return $req->fetchAll();
        }
        catch(PDOException $e){
            print_r($e->getMessage());
        }
    }

    public function edit($id, $user_id, $post_id, $body)
    {
        $sql = "UPDATE comments SET user_id = :user_id, post_id = :post_id, body= :body, updated_at = :updated_at WHERE id = :id";
        try{
            $req = Database::getBdd()->prepare($sql);
            return $req->execute([
                'user_id' => $user_id,
                'post_id' => $post_id,
                'body' => $body,
                'id' => $id,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        catch(PDOException $e){
            print_r($e->getMessage());
        }
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM comments WHERE id = ?';
        try{   
            $req = Database::getBdd()->prepare($sql);
            return $req->execute([$id]);
        }
        catch(PDOException $e){
            print_r($e->getMessage());
        }
    }

    public function deleteAllCommentsFromPost($id)
    {
        $sql = 'DELETE FROM comments WHERE post_id = ?';
        try{   
            $req = Database::getBdd()->prepare($sql);
            return $req->execute([$id]);
        }
        catch(PDOException $e){
            print_r($e->getMessage());
        }
    }

    public function deleteAllCommentsFromUser($id)
    {
        $sql = 'DELETE FROM comments WHERE user_id = ?';
        try{   
            $req = Database::getBdd()->prepare($sql);
            return $req->execute([$id]);
        }
        catch(PDOException $e){
            print_r($e->getMessage());
        }
    }

    public function deleteAllCommentsFromPostFromUser($id)
    {
        $sql = 'DELETE FROM comments WHERE post_id = (SELECT id FROM posts WHERE user_id = ?)';
        try{   
            $req = Database::getBdd()->prepare($sql);
            return $req->execute([$id]);
        }
        catch(PDOException $e){
            print_r($e->getMessage());
        }
    }
}
?>