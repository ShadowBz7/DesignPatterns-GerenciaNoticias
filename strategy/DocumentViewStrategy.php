<?php
include_once "PostViewStrategy.php";
class DocumentViewStrategy implements PostViewStrategy {
    public function viewPost($post) {
        $link = $post['post_link']; 
    
        // Adicionar "https://" se não estiver presente
        if (!preg_match("/^(http|https):\/\//", $link)) {
            $link = "https://" . $link;
        }
    
        return "
            <article>
                <header class='mb-4'>
                    <h1 class='fw-bolder mb-1'>{$post['post_title']}</h1>
                </header>
                <section class='mb-5'>
                    <p>Este é um documento. Clique no botão abaixo para visualizá-lo:</p>
                    <a href='{$link}' target='_blank' class='btn btn-primary'>Visualizar Documento</a>
                </section>
            </article>";
    }
}
?>
