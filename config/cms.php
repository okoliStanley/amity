<?php

	return 
	[
		'theme'=>[

			'folder'=> 'themes',
			'active'=> 'default'

		],

	'templates' => [ 
		'home' => amity\Templates\HomeTemplate::class,
		'blog' => amity\Templates\BlogTemplate::class,
		'blog.post' => amity\Templates\BlogPostTemplate::class
	//

	]

	];


 ?>