<?php

class User implements JsonSerializable {

    protected $attributes = null;

    public function __construct(array $attributes = array()) {
        $this->attributes = $attributes;
    }
    
    public function __set($name, $value) {
        $this->attributes[$name] = $value;
    }
    
    public function __get($name) {
        return $this->attributes[$name];
    }

    public function jsonSerialize() {
        return $this->attributes;
    }
    
}
