<?php

include_once 'Post.php';
class DocumentPost extends Post {
    public function __construct($title, $details, $link) {
        $this->category = "Documentos";
        $this->title = $title;
        $this->details = $details;
        $this->link = $link;
    }

    public function saveToDatabase($conn) {
        // Preparando a query de inserção para os campos do banco
        $stmt = $conn->prepare("INSERT INTO posts (post_user, post_title, post_category, post_details, post_link) 
                                VALUES (?, ?, ?, ?, ?)");

        // Bind dos parâmetros
        $user_id = $_SESSION['user_id'];  // Supondo que o ID do usuário esteja armazenado na sessão
        $views = 0;  // Inicializando com 0 visualizações

        // Bind dos parâmetros à query
        $stmt->bind_param("issss", $user_id, $this->title, $this->category, $this->details, $this->link);

        // Executando a query
        return $stmt->execute();
    }
}
