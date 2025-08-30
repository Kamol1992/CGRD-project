<?php
class Blog {
    public function showLogin() {
        include "templates/login.php";
    }

    public function listPosts() {
        $posts = Post::all();
        include "templates/posts.php";
    }

    public function showCreateForm() {
        include "templates/create.php";
    }

    public function createPost(string $title, string $description) {
        Post::create($title, $description);
        $this->listPosts();
    }

    public function showEditForm(int $id) {
        $post = Post::find($id);
        include "templates/edit.php";
    }

    public function updatePost(int $id, string $title, string $description) {
        Post::update($id, $title, $description);
        $this->listPosts();
    }

    public function deletePost(int $id) {
        Post::delete($id);
    }

    public function notifications(){
        $data = [
            'create' => ['text' =>'News was successfull created!', 'type'=>'success'],
            'edit' => ['text' =>'News was successfull changed!', 'type'=>'success'],
            'error' => ['text' =>'Error while editing!', 'type'=>'error'],
            'delete' => ['text' =>'News was deleted!', 'type'=>'success']
        ];
        return $data;
    }
}
