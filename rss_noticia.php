<?php
// permite requisições a urls externas
ini_set('allow_url_fopen', 1);
ini_set('allow_url_include', 1);
 
// caminho do feed do meu blog
$feed = 'http://www.blog.saude.gov.br/geral?format=feed&type=rss';
//$feed = 'http://www.boletimdasaude.rs.gov.br/rss';
//$feed = 'http://www.blog.saude.gfile:///C:/Users/giova/Downloads/tcc.sqlov.br/geral?format=feed&type=rss';
// leitura do feed
$rss = simplexml_load_file($feed);
// limite de itens
$limit = 10;
// contador
$count = 0;
 
// imprime os itens do feed
if($rss)
{
    foreach ( $rss->channel->item as $item )
    {
        // formata e imprime uma string
		echo"<div id='label1' class='container'><p style=border-top: 3px solid #000;>";
			printf('<h1><a href="%s" title="%s" >%s</a><br />', $item->link, $item->title, $item->title);echo'</h1>';
			printf( $item->description, $item->description);
		echo"</p></div><br/> <br/>";
        // incrementamos a variável $count
        $count++;
        // caso nosso contador seja igual ao limite paramos a iteração
        if($count == $limit) break;
    }
}
else
{
    echo 'Não foi possível acessar o blog.';
}
?>