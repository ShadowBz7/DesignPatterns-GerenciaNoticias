<?php 
include_once "./head.php";
include_once "./config.php";
include_once "./header.php";
include_once "./main.php";
include_once "./strategy/InformationViewStrategy.php";
include_once "./strategy/DocumentViewStrategy.php";
include_once "./strategy/PostViewContext.php";

$postID = $_GET['post_id'];
$sql = "SELECT * FROM posts INNER JOIN users ON users.user_id = posts.post_user WHERE post_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $postID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $post = $result->fetch_assoc();
    $strategy = null;

    // Escolher a estratégia com base na categoria
    if ($post['post_category'] === 'Informações') {
        $strategy = new InformationViewStrategy();
    } elseif ($post['post_category'] === 'Documentos') {
        $strategy = new DocumentViewStrategy();
    }

    // Usar o contexto para exibir o post
    if ($strategy) {
        $context = new PostViewContext($strategy);
        echo $context->displayPost($post);
    } else {
        echo "<p>Categoria desconhecida.</p>";
    }
} else {
    echo "<p>Post não encontrado.</p>";
}
include_once "./footer.php";
include_once "./scripts.php";
?>