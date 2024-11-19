<?php
include_once "PostViewStrategy.php";
include_once "./templatemethod/PostPrintTemplate.php"; // Importar a classe base
include_once "./templatemethod/DocPost.php"; // Importar a classe para DOC
include_once "./templatemethod/PdfPost.php"; // Importar a classe para PDF

class InformationViewStrategy implements PostViewStrategy {
    public function viewPost($post) {
        // Verificar o formato desejado (doc ou pdf)
        $printOption = $_GET['printOption'] ?? null; // Recebe o formato via URL

        // Verificar se o usuário solicitou um download
        if ($printOption) {
            // Definir o tipo de impressão com base na opção escolhida
            $postPrinter = null;
            if ($printOption === 'doc') {
                $postPrinter = new DocPost();
            } else {
                $postPrinter = new PdfPost();
            }

            // Chamar o Template Method para gerar o download
            // Isso irá parar a execução e não permitirá que o conteúdo do post seja exibido na página
            $postPrinter->printPost($post);

            // Parar a execução aqui para evitar exibição da página
            exit();
        }

        // Caso não tenha sido solicitado um download, exibe a visualização do post
        return "
            <article>
                <header class='mb-4'>
                    <h1 class='fw-bolder mb-1'>{$post['post_title']}</h1>
                    <div class='text-muted mb-2'>
                        <i class='bi bi-eye'></i> {$post['post_views']} Views | 
                        Posted on {$post['post_date']} by 
                        <a class='links text-capitalize' href='javascript:void(0);'>
                            <i class='bi bi-person-fill'></i> {$post['user_name']}
                        </a>
                    </div>
                </header>
                <section class='mb-5'>
                    <p>{$post['post_details']}</p>
                    <h6 class='mt-5 mb-3'>Category:</h6>
                    <a class='btn btn-light text-dark border border-1 my-1 fw-bold' href='posts_by_category.php?cat_name={$post['post_category']}' style='font-size: 12px;'>
                        <i class='bi bi-tag-fill'></i> {$post['post_category']}
                    </a>
                    <!-- Links para Print -->
                    <a href='view_blog_post.php?post_id={$post['post_id']}&printOption=doc' class='btn btn-secondary'>Print as DOC</a>
                    <a href='view_blog_post.php?post_id={$post['post_id']}&printOption=pdf' class='btn btn-secondary'>Print as PDF</a>
                </section>
            </article>";
    }
}
?>
