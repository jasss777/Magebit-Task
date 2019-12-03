<?php
class Validate {
    private $_passed = false,
            $_errors = array(),
            $_db = null;

     /**
    *  $this->_db - create new db instance
    */ 
    public function __construct(){
        $this->_db = DB::getInstance();
    }

    /**
    *  method check - require $source = Get or Post and $items = name, password, email.
    * $value  - using foreach in $items add each $item element to $value and than check each $item rules.
    * if any of rules is not passed add error.
    * check if error count = 0, if yes than change $_passed from false to true.
    */ 
    public function check($source, $items = array()){
        foreach($items as $item => $rules){
            foreach($rules as $rule => $rule_value){

                $value = trim($source[$item]);
                $item = escape($item);
                
                if ($rule ==='required' && empty($value)) {
                    $this->addError("<script>alert('{$item} is required')</script>");
                } else if (!empty($value)){
                    switch($rule){
                        case 'min':
                            if (strlen($value) < $rule_value) {
                                $this->addError("<script>alert('{$item} must be a minimum of {$rule_value} characters.')</script>");
                            }
                        break;
                        case 'max':
                        if (strlen($value) > $rule_value) {
                            $this->addError("<script>alert('{$item} must be a maximum of {$rule_value} characters.')</script>");
                        }
                        break;
                        case 'unique':
                            $check = $this->_db->get($rule_value, array($item, '=', $value));
                            if ($check->count()) {
                                $this->addError("<script>alert('{$item} already exists.');</script>");
                            }
                        break;
                    }

                }
            }
        }
        if (empty($this->_errors)) {
            $this->_passed = true;
        }
        return $this;
    }

    private function addError($error){
        $this->_errors[] = $error;
    }

    public function errors(){
        return $this->_errors;
    }

    public function passed(){
        return $this->_passed;
    }
}
