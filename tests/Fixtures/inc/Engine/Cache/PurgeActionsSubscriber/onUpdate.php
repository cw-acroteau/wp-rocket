<?php
return [
    'NotSuperiorShouldGenerate' => [
        'config' => [
              'new_version' => '3.13',
              'old_version' => '3.11',
			  'is_superior' => false
        ],
    ],
	'SuperiorShouldNotGenerate' => [
		'config' => [
			'new_version' => '3.13',
			'old_version' => '3.13',
			'is_superior' => true
		],
	],
];