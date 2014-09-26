<?php

return array(

/*************************************
	EDIT PAGE
**************************************/
	'title' => 'Backlink Yönetimi',

	'single' => 'Backlink',

	'model' => 'Backlink',

	'form_width' => 800,

	'sort' => array(
	    'field' => 'id',
	    'direction' => 'desc',
	),

/*************************************
	EDIT COLUMNS
**************************************/

	'columns' => array(
	    'check_url' => array(
	        'title' => 'Kontrol Adresi'
	    ),
	    'link_one' => array(
	        'title' => 'link 1'
	    ),
	    'link_two' => array(
	        'title' => 'link 2'
	    ),
	    'link_three' => array(
	        'title' => 'link 3'
	    ),
	    'check_count' => array(
	        'title' => 'Kontrol Sayısı'
	    ),
	    'created_at' => array(
	        'title' => 'Oluşturma Tarihi',
	        'output' => '(:value)',
	    ),
	),

/*************************************
	EDIT FIELDS
**************************************/
	'edit_fields' => array(
	    'check_url' => array(
	        'title' => 'Kontrol Adresi',
	        'type' => 'text'
	    ),
	    'link_one' => array(
	        'title' => 'Link 1',
	        'type' => 'text'
	    ),
	    'link_two' => array(
	        'title' => 'Link 2',
	        'type' => 'text'
	    ),
	    'link_three' => array(
	        'title' => 'Link 3',
	        'type' => 'text'
	    ),
	    'check_count' => array(
	        'title' => 'Kontrol Sayısı',
	        'type' => 'text',
	        'editable' => false,
	    ),

	),
	
/*************************************
	VALIDATIONS
**************************************/
	'rules' => array(
	    'check_url' 	=> 'required|url',
	    'link_one'		=> 'required',
	)
);
