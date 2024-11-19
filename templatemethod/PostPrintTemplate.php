<?php
abstract class PostPrintTemplate {
    // Template Method
    public function printPost($post) {
        $formattedPost = $this->formatPost($post);
        return $this->downloadPost($formattedPost);
    }

    // Etapa 1: Formatar o post (a ser implementado pelas subclasses)
    protected abstract function formatPost($post);

    // Etapa 2: Realizar o download (a ser implementado pelas subclasses)
    protected abstract function downloadPost($formattedPost);
}
?>
