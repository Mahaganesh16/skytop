<?php
class PHPWordLoader {
    public function __construct() {
        require_once(APPPATH . 'third_party/PHPWord/PhpWord.php');
    }
}
?>