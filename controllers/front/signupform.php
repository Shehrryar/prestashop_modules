<?php
/**
 * <ModuleClassName> => Cheque
 * <FileName> => validation.php
 * Format expected: <ModuleClassName><FileName>ModuleFrontController
 */
class addifyexterafieldgeneratormodulesignupformModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();

        $this->context->smarty->assign(
            array(
                'paymentId' => 'this is the signup controller', 
            )
        );
        return $this->setTemplate('module:addifyexterafieldgeneratormodule/views/templates/front/signupform.tpl');

    }

}


