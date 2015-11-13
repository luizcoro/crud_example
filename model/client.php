<?php

class client
{
    private $_email;
    private $_name;
    private $_mobile;

    public function __construct($email, $name, $mobile)
    {
        $this->_email = $email;
        $this->_name = $name;
        $this->_mobile = $mobile;
    }
    
    public function get_email()
    {
        return $this->_email;
    }

    public function set_email($email)
    {
        $this->_email = $email;
    }

    public function get_name()
    {
        return $this->_name;
    }

    public function set_name($name)
    {
        $this->_name = $name;
    }
    
    public function get_mobile()
    {
        return $this->_mobile;
    }

    public function set_mobile($mobile)
    {
        $this->_mobile = $mobile;
    }
}

?>
