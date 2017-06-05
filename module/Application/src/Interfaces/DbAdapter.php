<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 05/06/17
 * Time: 19:54
 */

namespace Application\Interfaces;


interface DbAdapter
{
    public function fetch($id);

    public function fetchAll($where = null, $order = null);

    public function insert($data, $table);

    public function update($id, $data, $table);

    public function delete($id, $table);
}