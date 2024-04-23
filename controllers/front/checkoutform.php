<?php


class addifyexterafieldgeneratormodulecheckoutformModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        echo Tools::getValue('');
        $this->setTemplate('module:addifyexterafieldgeneratormodule/views/templates/front/emptyfile.tpl');


    }

}

?>