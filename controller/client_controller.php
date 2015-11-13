<?php

include_once 'model/client_dao.php';
include_once 'view/client_view.php';
include_once 'controller/client_controller.php';

class client_controller
{
    private $_model;
    private $_view;
    private $_args;
    
    public function __construct($model, $view, $args)
    {
        $this->_model = $model;
        $this->_view = $view;
        $this->_args = $args;
    }

    public function handle_request()
    {
        switch($this->_args['action'])
        {
        case 'select':
            $this->handle_select();
            break;
        case 'select_all':
            $this->handle_select_all();
            break;
        case 'find':
            $this->handle_find();
            break;
        case 'insert':
            $this->handle_insert();
            break;
        case 'update':
            $this->handle_update();
            break;
        case 'delete':
            $this->handle_delete();
            break;
        default:
            $this->handle_missing_action();

        }
    }
    
    private function handle_select()
    {


    }

    private function handle_select_all()
    {


    }

    private function handle_find()
    {

    }

    private function handle_insert()
    {
        if($this->_model->insert(new client($this->_args['client_email'], $this->_args['client_name'], $this->_args['client_mobile'])))
            $this->_view->set_alert_on_startup("Client inserted");
        else
            $this->_view->set_alert_on_startup("Client already inserted");

        $this->_view->set_clients($this->_model->select_all());   
        $this->_view->show();
    }

    private function handle_update()
    {
        if($this->_model->update(new client($this->_args['client_email'], $this->_args['client_name'], $this->_args['client_mobile'])))
            $this->_view->set_alert_on_startup("Client updated");
        else
            $this->_view->set_alert_on_startup("Client not found");
        
        $this->_view->set_clients($this->_model->select_all());
        $this->_view->show();

    }

    private function handle_delete()
    {
        $this->_model->delete($this->_args['client_email']);

        $this->_view->set_alert_on_startup("Client deleted");
        $this->_view->set_clients($this->_model->select_all());
        $this->_view->show();

    }
    
    private function handle_missing_action()
    {  
        $this->_view->set_clients($this->_model->select_all());
        $this->_view->show();
    }
}
