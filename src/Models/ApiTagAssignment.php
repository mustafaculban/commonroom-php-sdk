<?php
namespace CommonRoom\Models;

class ApiTagAssignment {
    public function __construct() {
    }

    public static function fromArray(array $data){
        return new self();
    }

    public function toArray() {
        return [];
    }
}
?>
