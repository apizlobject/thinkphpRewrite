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

    /**
     * 查询当天时间数据
     * @param string $field 时间字段
     * @param bool $isTimeInt false使用时间戳 true直接时间
     * @return array
     */
    public function nowTimeData($field = 'add_date', $isTimeInt = false) {
        if ($isTimeInt) {
            return $this->query('SELECT *FROM ' . $this->trueTableName . ' WHERE DATEDIFF(' . $field . ' ,NOW())=0');
        } else {
            return $this->query('SELECT *FROM ' . $this->trueTableName . ' WHERE DATEDIFF(FROM_UNIXTIME(' . $field . ') ,NOW())=0');
        }
    }

    /**
     * 自定义查询时间数据
     * @param string $field 时间字段
     * @param int $time 当天就是0 前一天是-1以此类推
     * @param bool $isTimeInt
     * @return array
     */
    public function getTimeData($field = 'add_date', $time = '0', $isTimeInt = false) {
        if ($isTimeInt) {
            return $this->query('SELECT *FROM ' . $this->trueTableName . ' WHERE DATEDIFF(' . $field . ' ,NOW())=0');
        } else {
            return $this->query('SELECT *FROM ' . $this->trueTableName . ' WHERE DATEDIFF(FROM_UNIXTIME(' . $field . ') ,NOW())=0');
        }
    }

    /**
     * 自定义查询时间数据总数
     * @param string $field 时间字段
     * @param int $time 当天就是0 前一天是-1以此类推
     * @param bool $isTimeInt
     * @return int
     */
    public function getTimeDataCount($field = 'add_date', $time = '0', $isTimeInt = false) {
        if ($isTimeInt) {
            $reslut = $this->query('SELECT count(*) as count FROM ' . $this->trueTableName . ' WHERE DATEDIFF(' . $field . ' ,NOW())=0');
        } else {
            $reslut = $this->query('SELECT count(*) as count FROM ' . $this->trueTableName . ' WHERE DATEDIFF(FROM_UNIXTIME(' . $field . ') ,NOW())=0');
        }
        if (!empty($reslut)) {
            return $reslut[0]['count'];
        } else {
            return 0;
        }
    }

}
