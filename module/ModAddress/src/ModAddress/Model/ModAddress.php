<?php
namespace ModAddress\Model;

class ModAddress
{
    public $id;
    public $ipaddress;
    public $hostname;
	public $description;
	
	
    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->ipaddress = (isset($data['ipaddress'])) ? $data['ipaddress'] : null;
        $this->hostname  = (isset($data['hostname'])) ? $data['hostname'] : null;
		$this->description  = (isset($data['description'])) ? $data['description'] : null;
    }
}