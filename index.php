<?php

set_time_limit(0);

require_once('simple_html_dom.php');
$pages = [
	'https://google.com.br',
	'https://g1.globo.com',
];

$pageData = [];
foreach($pages as $page) {
	// $html = file_get_html('https://br.thebar.com/whisky-johnnie-walker-black-label--750ml-gre30259/p');
	$html = file_get_html($page);
	
	
	if($html) {
		$pageData[] = [
		
			'url' => $page,
			'title' => $html->find('title')[0]->innertext,
			'description' => $html->find('meta[name=description]')[0]->content,
		];
	}
}

print json_encode($pageData);
