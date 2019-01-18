<?php

class Application_Form_Test extends Zend_Form
{

    public $elementDecorator = array(
        'ViewHelper',
        'Errors',
        array('HtmlTag', array('tag' => 'td', 'class' => 'element')),
        array('Label', array('tag' => 'td')),
        array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
    );

    public $buttonDecorator = array(
        'ViewHelper',
        array('HtmlTag', array('tag' => 'td', 'class' => 'element')),
        array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
    );


    public function init()
    {
        $text = new Zend_Form_Element_Text('text');
        $text->setLabel('Text:')
            ->setRequired(true);
        $text->addValidator('StringLength', true, array(
            'min' => 10,
            'max' => 30,
            'messages' => array(
                'stringLengthTooShort' => "Длина введенного значения '%value%', меньше чем '%min%' символов",
                'stringLengthTooLong' => "Длина введенного значения '%value%', больше чем '%max%' символов"
            )
        ));

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('OK');

        $this->addElements(array($text, $submit));



/*        $text = new Zend_Form_Element_Text('text');
        $text->setLabel('text')
             ->setRequired(true)
             ->addValidator('NotEmpty', true, array(
                 'messages' => array('isEmpty' => 'Введенное значение пустое, заполните пожалуйста поле.')
             ))
             ->addValidator('Between', true, array(
                 'messages' => array('notBetween' => "'%value%' не находится между '%min%' и '%max%', включительно"),
                 'min' => 0,
                 'max' => 10
             ));

        $validator = new Zend_Validate_NotEmpty();
        $validator->setMessages(array('isEmpty' => 'Введенное значение пустое, заполните пожалуйста поле.'));
        $text->addValidator($validator);

        $validator = new Zend_Validate_Between(array('min' => 0, 'max' => 10));
        $validator->setMessages(array('notBetween' => "'%value%' не находится между '%min%' и '%max%', включительно"));
        $text->addValidator($validator);

        $textarea = new Zend_Form_Element_Textarea('textarea');
        $textarea->setLabel('textarea');
        $textarea->setAttribs(array('cols' => 30, 'rows' => 10));

        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('password');

        $hidden = new Zend_Form_Element_Hidden('hidden');
        $hidden->setValue('222');

        $checkbox = new Zend_Form_Element_Checkbox('checkbox');
        $checkbox->setLabel('checkbox:')
                 ->setChecked(true);

        $multiCheckbox = new Zend_Form_Element_MultiCheckbox('multiCheckbox');
        $multiCheckbox->setLabel('multiCheckbox:')
                      ->addMultiOptions(array(
                          '1' => 'Apple',
                          '2' => 'Orange',
                          '3' => 'Banana'
                      ))
                      ->setSeparator(' | ')
                      ->setValue(array('1', '3'));

        $radio = new Zend_Form_Element_Radio('radio');
        $radio->setLabel('radio:')
              ->addMultiOptions(array(
                    '1' => 'Apple',
                    '2' => 'Orange',
                    '3' => 'Banana'
             ))
             ->setSeparator(', ')
             ->setValue('2');

        $select = new Zend_Form_Element_Select('select');
        $select->setLabel('select:')
               ->addMultiOptions(array(
                    '1' => 'Apple',
                    '2' => 'Orange',
                    '3' => 'Banana'
               ))
               ->setValue('3');

        $multiSelect = new Zend_Form_Element_Multiselect('multiSelect');
        $multiSelect->setLabel('multiSelect:')
            ->addMultiOptions(array(
                '1' => 'Apple',
                '2' => 'Orange',
                '3' => 'Banana'
            ))
            ->setValue(array('1', '2'));



        $button = new Zend_Form_Element_Button('button');
        $button->setLabel('Push the button!');

        $reset = new Zend_Form_Element_Reset('reset');
        $reset->setLabel('reset');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('submit');

        $this->setDecorators(array(
            array('ViewScript', array('viewScript' => 'myform.phtml'))
        ));

        $elements = array($text, $textarea, $password, $hidden, $checkbox,
            $multiCheckbox, $radio, $select, $multiSelect, $button, $reset, $submit);
        for ($i=0; $i < count($elements); $i++) {
            $elements[$i]->removeDecorator('Label');
            $elements[$i]->removeDecorator('HtmlTag');
            $elements[$i]->removeDecorator('DtDdWrapper');
            $elements[$i]->removeDecorator('Description');
            $elements[$i]->removeDecorator('Errors');
        }


        $this->addElements($elements);*/
    }


}

