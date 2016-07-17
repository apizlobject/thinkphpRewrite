<?php

namespace Rewrite;

/**
 * 表单模型验证扩展
 * @author chenran 2016-7-16
 */
class FormModels {

    public $data;
    public $_rules;
    public $_auto;

    public function rules() {
        return $this->_rules = [
            ['_test', 'require', '不能为空']
        ];
    }

    public function auto() {
        return [
            ['_test', 'function', '不能为空']
        ];
    }

    public function load($data) {
        if (empty($this->_rules)) {
            $this->rules();
        }
        if (empty($this->_auto)) {
            $this->auto();
        }
        $this->data = $data;
        $this[] = $data;
    }

    public function validate() {
        foreach ($this->data as $k => $val) {
            
        }
    }

}

// 设置控制器别名 便于升级
class_alias('Rewrite\FormModels', 'Think\FormModels');
