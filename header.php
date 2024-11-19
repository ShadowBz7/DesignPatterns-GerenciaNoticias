<!-- header.php -->
<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('config.php');
include('php/sysad_functions.php');

if(isset($_SESSION['user_id'])):
$userID = $_SESSION['user_id'];
endif;
?>
<body>
<header>

    <header1>
        <navh1>
            
            <div class="brflag"><img alt="1" src="./images/brflag.svg" style="padding-right: 8px;"><a href="https://www.gov.br/pt-br">BRAZIL</a></div>
        <ul>
            <li><a href="https://www.gov.br/economia/pt-br/canais_atendimento/ouvidoria/simplifique">Simplify!</a></li>
            <li><a href="https://www.gov.br/secom/pt-br/acesso-a-informacao/comunicabr/">Comunica BR</a></li>
            <li><a href="https://www.gov.br/pt-br/participacao-social/">Participate</a></li>      
            <li><a href="https://www.gov.br/acessoainformacao/pt-br">Access to information</a></li>                    
            <li><a href="https://www4.planalto.gov.br/legislacao">Legislation</a></li>
            <li><a href="https://www.gov.br/pt-br/canais-do-executivo-federal">Channels</a></li>
            
        </ul> 
            <div class="center" style="border-radius: 10px;"><img alt="vlibras"  src="./images/vlibras2.svg" style="padding-left: 4px; width: 100%;"></div>
        </navh1>
    </header1>

    <header2>
        <div class="LR-obj">
            <ul>
                <li>Go to content [1]</li>
                <li>Go to menu [2]</li>
                <li>Go to search [3]</li>
                <li>Go to footer [4]</li>
            </ul>
            <ul >
                <li>ACCESSIBILITY</li>
                <li>CONTRAST</li>
                <li> SITE MAP</li>
            </ul>
        </div>
        <div class="block"></div>
            <div class="LR-obj">    
                <h1>Federal Institute Baiano</h1>
                <searchbar class="LR-obj">Search on site
                    <img alt src="./images/btn_pesquisar.png">
                </searchbar>
            </div>
        
        
        <h6 class="block">Campus Catu</h6>
    </header2>
        <div class="tecnologysad"><h5>TECHNOLOGY IN SYSTEMS ANALYSIS AND DEVELOPMENT</h5></div> 
</header>