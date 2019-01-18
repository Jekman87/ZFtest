<?php

class Application_Form_Contact extends Zend_Form
{

    public function init()
    {
        $this->setAttrib('enctype', 'multipart/form-data');

        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Ваш email:')
              ->setRequired(true)
              ->addValidator('NotEmpty', true,
                    array('messages' => array(
                        'isEmpty' => 'Введите email'
                    ))
              )
              ->addValidator('EmailAddress', true,
                    array('messages' => array(
                        'emailAddressInvalidFormat' => 'Введите правильный email'
                    ))
              )
        ;

        $text = new Zend_Form_Element_Textarea('message');
        $text->setLabel('Сообщение:')
             ->setRequired(true)
             ->addValidator('NotEmpty', true,
                 array('messages' => array(
                     'isEmpty' => 'Введите сообщение'
                 ))
             )
        ;

        $file = new Zend_Form_Element_File('file');
        $file->setLabel('Документ:')
             ->setDestination('files')
             ->addValidator('Extension', true,
                 array(
                     'extension' => 'jpeg',
                     'messages' => array(
                         'fileExtensionFalse' => 'Загружать моно только jpeg'
                 ))
             )
        ;

        $submin = new Zend_Form_Element_Submit('submit');
        $submin->setLabel('Отправить');

        $this->addElements(array($email, $text, $file, $submin));
    }


}

