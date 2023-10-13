<?php

namespace App\Bundle\Auto;

class Bundle extends \TAO\Bundle
{
	public function init()
	{
		\TAO\Infoblock::$classes['auto'] = '\App\Bundle\Auto\Infoblock\Auto';
        $this->myInfoblock('auto');
	}

	public function routes()
	{
		return array(
			'{^/auto/$}' => array('action' => 'viewSections'),
			'{^/auto/([a-zA-Z]+)/$}' => array('action' => 'viewList', '{1}'),
			'{^/auto/[a-zA-Z]+/(\d+)/$}' => array('action' => 'viewItem', '{1}'),
		);
	}
}