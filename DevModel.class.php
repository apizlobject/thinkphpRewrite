<?php

namespace Rewrite;

/**
 * 数据模型继承官方
 * @author chenran
 */
class DevModel extends \Think\Model {

    public function __construct($name = '', $tablePrefix = '', $connection = '') {
        parent::__construct($name, $tablePrefix, $connection);
    }

    /**
     * 查询整个表的总数
     * @author chenran 
     * @return int
     */
    public function allCount($field = '') {
        if (empty($field)) {
            $result = $this->query("select count(*) as count from {$this->trueTableName} ");
        } else {
            $result = $this->query("select count({$field}) as count from {$this->trueTableName} ");
        }
        if ($result) {
            return $result[0]['count'];
        }
        return 0;
    }

}
