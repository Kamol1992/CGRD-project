<?php
class Auth {
    public static function logout() {
        session_destroy();
        header("Location: index.php");
        exit;
    }

    public function notification(){
        $data = [
            'error' => ['text' =>'Wrong Login Data!', 'type'=>'error']
        ];
        return $data;
    }
}
