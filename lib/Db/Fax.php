<?php
namespace OCA\FaxApp\Db;

use OCP\AppFramework\Db\Entity;

class Fax extends Entity {

    protected $subject;
    protected $toName;
    protected $toLine3;
    protected $toFax;
    protected $fromName;
    protected $fromAddress;
    protected $fromCity;
    protected $fromState;
    protected $fromPhone;
    protected $fromEmail;
    protected $fromZip;
    protected $faxMessage;
    protected $userId;
    protected $status;
    protected $createdAt;


    public function __construct() {
        // add types in constructor
        // $this->addType('stars', 'integer');
    }
}
