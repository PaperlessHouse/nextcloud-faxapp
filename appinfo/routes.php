<?php

return [
    'routes' => [
	   ['name' => 'fax#index', 'url' => '/fax', 'verb' => 'GET'],
       ['name' => 'fax#show', 'url' => '/fax/{id}', 'verb' => 'GET'],
       ['name' => 'fax#update', 'url' => '/fax/{id}', 'verb' => 'POST'],
       ['name' => 'fax#send', 'url' => '/fax/{id}/send', 'verb' => 'GET'],
       ['name' => 'AdminSettings#applySettings','url' => '/admin/apply_settings','verb' => 'POST'
       ],
    ]
];
