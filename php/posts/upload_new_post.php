<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Include the database configuration
include('../../config.php');
// Include the functions file to call sweet alert message function
include('../sysad_functions.php');
include_once '../../abstractfactory/InformationPostFactory.php';
include_once '../../abstractfactory/DocumentPostFactory.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];  // 'category' no formulário
    $title = sanitizeInput($_POST["title"]);
    $post_details = $_POST["post_details"];
    $link = sanitizeInput($_POST["post_link"]);
    $post = null;

    try {
        // Escolher fábrica com base na categoria
        $factory = null;
        if ($category === "Documentos") {
            $factory = new DocumentPostFactory();
        } elseif ($category === "Informações") {
            $factory = new InformationPostFactory();
        } else {
            throw new Exception("Categoria inválida.");
        }

        // Criar o post com a fábrica selecionada
        $post = $factory->createPost($title, $post_details, $link);

        // Agora, associar a categoria correta no banco de dados
        $post->category = $category;  // Defina a categoria para 'post_category'

        // Verificar e salvar
        if ($post && $post->saveToDatabase($conn)) {
            showAlert("success", "Postagem criada!", "Seu post foi salvo com sucesso.");
        } else {
            throw new Exception("Erro ao salvar o post.");
        }
    } catch (Exception $e) {
        showAlert("error", "Erro", $e->getMessage());
    }

    // Redirecionar de volta para a página anterior
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

// Close connection
$conn->close();
?>
