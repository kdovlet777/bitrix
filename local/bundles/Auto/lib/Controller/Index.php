<?php

namespace App\Bundle\Auto\Controller;

class Index extends \TAO\Controller
{
    public function viewSections()
    {
        $sections = \TAO::getInfoblock('auto')->getSectionsTree();
        return $this->render('index', array('sections' => $sections));
    }
    
    public function viewList($sectionCode)
    {
        $list = \TAO::getInfoblock('auto')->getSectionByCode($sectionCode);

        return $this->render('listSection', array('list' => $list));
    }

    public function viewItem($id)
    {
        $item = \TAO::getInfoblock('auto')->loadItem($id);

        if (!$item) {
            return $this->pageNotFound();
        }
        return $this->render('item', array('item' => $item));
    }
}