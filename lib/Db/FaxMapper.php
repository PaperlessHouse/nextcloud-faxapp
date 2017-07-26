<?php

namespace OCA\FaxApp\Db;

use OCP\IDBConnection;
use OCP\AppFramework\Db\Mapper;

class FaxMapper extends Mapper {

    public function __construct(IDBConnection $db) {
        parent::__construct($db, 'fax');
    }


    /**
     * @throws \OCP\AppFramework\Db\DoesNotExistException if not found
     * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException if more than one result
     */
    public function get($id, $userId) {
        $sql = 'SELECT * FROM `*PREFIX*fax` ' .
            'WHERE `id` = ? AND `user_id` = ?';
        return $this->findEntity($sql, [$userId, $id]);
    }


    public function getAll($userId) {
        $sql = 'SELECT * FROM `*PREFIX*fax` WHERE `user_id` = ?';
        return $this->findEntities($sql, [$userId]);
    }

}
