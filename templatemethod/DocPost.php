<?php

class DocPost extends PostPrintTemplate {
    protected function formatPost($post) {
        // Aqui você pode gerar o conteúdo do post formatado para DOC
        $content = "
        <h1>{$post['post_title']}</h1>
        <p>{$post['post_details']}</p>
        <p>Category: {$post['post_category']}</p>
        ";
        return $content;
    }

    protected function downloadPost($formattedPost) {
        // Definindo o cabeçalho para download de um arquivo .doc
        header('Content-Type: application/msword');
        header('Content-Disposition: attachment; filename="post.doc"');
        echo $formattedPost;
    }
}
?>
