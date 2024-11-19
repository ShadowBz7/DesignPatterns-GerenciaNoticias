<?php
include_once 'Post.php';

class InformationPost extends Post {
    public function __construct($title, $details) {
        $this->category = "Informações";
        $this->title = $title;
        $this->details = $details;
    }

    public function saveToDatabase($conn) {
        // Preparando a query de inserção para os campos do banco
        $stmt = $conn->prepare("INSERT INTO posts (post_user, post_title, post_category, post_details) 
                                VALUES (?, ?, ?, ?)");

        // Bind dos parâmetros
        $user_id = $_SESSION['user_id'];  // Supondo que o ID do usuário esteja armazenado na sessão
        $views = 0;  // Inicializando com 0 visualizações

        // Bind dos parâmetros à query
        $stmt->bind_param("isss", $user_id, $this->title, $this->category, $this->details);

        // Executando a query
        return $stmt->execute();
    }
}
