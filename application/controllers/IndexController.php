<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {

       /* $params = array(
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'dbname'   => 'zfdb'
        );

        $db = Zend_Db::factory('Pdo_Mysql', $params);

        $writer = new Zend_Log_Writer_Stream('../logs/application.log');
        $logger = new Zend_Log($writer);

        try {
            $db->query("CREATE TABL error");
        } catch (Exception $e) {
            $logger->err("Ошибка ошибка в indexAction\n" . $e);
        }*/



        /*        $logger->log('Система обрушилась', Zend_Log::EMERG);
        $logger->emerg('Система обрушилась');

        $logger->log('Нужно срочно исправить', Zend_Log::ALERT);
        $logger->alert('Нужно срочно исправить');

        $logger->log('Ошибка', Zend_Log::ERR);
        $logger->err('Ошибка');

        $logger->log('Предупреждение', Zend_Log::WARN);
        $logger->warn('Предупреждение');

        $logger->log('Уведомление', Zend_Log::NOTICE);
        $logger->notice('Уведомление');

        $logger->log('Информационное сообщение', Zend_Log::INFO);
        $logger->info('Информационное сообщение');

        $logger->log('Отладка приложения', Zend_Log::DEBUG);
        $logger->debug('Отладка приложения');*/



/*        $contactForm = new Application_Form_Contact();
        $this->view->contactForm = $contactForm;

        if ($this->_request->isPost() && $contactForm->isValid($this->_request->getPost()))
        {
            $formValues = $contactForm->getValues();

            $config = array(
                'auth' => 'login',
                'username' => 'почта',
                'password' => 'пароль',
                'ssl' => 'tls'
            );

            $connection = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);

            $mail = new Zend_Mail('utf-8');
            $mail->setBodyHtml($formValues['email'] . "<br />" . $formValues['message']);
            $mail->addTo('почта');
            $mail->setSubject('Контактная форма');

            if (!is_null($formValues['file']) && $contactForm->file->receive())
            {
                $file = $mail->createAttachment(file_get_contents('files/' . $formValues['file']));
                $file->filename = $formValues['file'];
                unlink('files/' . $formValues['file']);
            }

            $mail->send($connection);

            $contactForm->reset();
        }*/

        $config = array(
            'auth' => 'login',
            'username' => 'почта',
            'password' => 'пароль',
            'ssl' => 'tls'
        );

        $connection = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);

        $mail = new Zend_Mail('utf-8');
        //$mail->setBodyText('Привет от Zend Mail');  //для отправки простого текстового письма, сам текст
        $mail->setBodyHtml('<h1>Привет от Zend Mail.</h1> <p>Отправка сообщений с вложениями.</p>');
        $mail->setFrom('почта2', 'Evgen');
        $mail->addTo('почта1'); //можно создавать несколько получателей
        $mail->setSubject('Тестовое сообщение'); //тема письма


        try {
            if (APPLICATION_ENV == 'development') $mail->send($connection);
            else $mail->send();
            $this->view->message = 'Сообщение было отправлено. Спасибо!';
        } catch (Exception $e) {
            $this->view->message = 'Во время отправки возникла ошибка.';
        }



    }

    public function aAction()
    {
    }

    public function bAction()
    {
    }

    public function cAction()
    {
    }

    public function dAction()
    {
    }

    public function eAction()
    {
    }

    public function listAction()
    {
    }

    public function loginAction()
    {

        if (Zend_Auth::getInstance()->hasIdentity())
            $this->_helper->redirector('index', 'index');


        $authAdapter = new Zend_Auth_Adapter_DbTable();

        $authAdapter->setTableName('users')
                    ->setIdentityColumn('username')
                    ->setCredentialColumn('password')
                    ->setCredentialTreatment("MD5(CONCAT(MD5(SUBSTRING(salt, 1, 3)), ?, MD5(SUBSTRING(salt, 4))))");

        $authAdapter->setIdentity('admin')
                    ->setCredential('secret');

        $auth = Zend_Auth::getInstance();
        $result = $auth->authenticate($authAdapter);

        if ($result->isValid())
            echo "OK";
        else
            echo "NOT OK";
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector('index', 'index');
    }

    public function tableAction()
    {
        $params = array(
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'dbname'   => 'zfdb'
        );

        $db = Zend_Db::factory('Pdo_Mysql', $params);
        $db->query("SET NAMES utf8");

        $columnMapping = array('prior' => 'priority', 'msg' => 'message');

        $writer = new Zend_Log_Writer_Db($db, 'logs', $columnMapping);
        $logger = new Zend_Log($writer);

        $mail = new Zend_Mail();
        try {
            $mail->send();
        } catch (Exception $e) {
            $logger->err("Ошибка при отправке почты\n" . $e);
        }
    }


}











