<?php

class PdfPost extends PostPrintTemplate {
    protected function formatPost($post) {
        // Aqui você pode gerar o conteúdo do post formatado para PDF
        // Usaremos uma biblioteca como FPDF ou TCPDF, mas para simplificação, deixo apenas o conteúdo
        $content = "
        <h1>{$post['post_title']}</h1>
        <p>{$post['post_details']}</p>
        <p>Category: {$post['post_category']}</p>
        ";
        return $content;
    }

    protected function downloadPost($formattedPost) {
        // Usando FPDF ou TCPDF para gerar o PDF
        // Para simplificação, vamos apenas exibir o conteúdo em PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="post.pdf"');
        echo $formattedPost;
    }
}
?>
