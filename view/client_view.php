<?php

class client_view
{
    private $_clients;
    private $_alert;


    public function set_clients($clients)
    {
        $this->_clients = $clients;
    }

    public function set_alert_on_startup($alert)
    {
        $this->_alert = $alert;
    }

    public function show()
    {
        $clients = $this->_clients;
        $alert = $this->_alert;

        ob_start();

        include 'web/clients.php';

        echo ob_get_clean();   
    }

}
