<?php
namespace ModAddress\Model;

use Zend\Db\TableGateway\TableGateway;

class ModAddressTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getModAddress($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveModAddress(ModAddress $addresses)
    {
        $data = array(
            'ipaddress' => $addresses->ipaddress,
            'hostname'  => $addresses->hostname,
            'description'  => $addresses->description,
        );

        $id = (int)$addresses->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getModAddress($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteModAddress($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}