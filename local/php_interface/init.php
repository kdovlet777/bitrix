<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/local/vendor/autoload.php');
TAO::Init([
	//'auth' => 'https://office.techart.ru/project11393/siteadmin/',
    'infoblock.schema.delete' => false,
]);

\TAO::addBundle('Auto');

/*
 * при первой авторизации пользователя можно
 * дополнить массив $fields обязательными полями
 */
\TAO\Events::addListener('auth.add_office_user', 'onAddUserEvent');

function onAddUserEvent(&$fields, &$shouldAdd) {
    $fields['UF_NESSESARY'] = '123';
}

/*
 * при последующих авторизациях (когда пользователь уже создан)
 * можно так же дополнить массив $fields,
 * чтобы обновить значения полей пользователя
 */
\TAO\Events::addListener('auth.update_office_user', 'onUpdateUserEvent');

function onUpdateUserEvent(&$fields, &$shouldUpdate) {
    $fields['UF_NESSESARY'] = '123';
}