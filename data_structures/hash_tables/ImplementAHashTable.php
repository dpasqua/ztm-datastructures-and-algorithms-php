<?php

class HashTable
{
    private \SplFixedArray $data;

    public function __construct(int $size) {
        $this->data = new \SplFixedArray($size);
    }

    public function set(string $key, $value) {
        $address = $this->_hash($key);
        if (!isset($this->data[$address])) {
            $this->data[$address] = [];
        }

        $el = $this->data[$address];
        $el[] = [$key, $value];
        $this->data[$address] = $el;
    }

    public function get(string $key) {
        $address = $this->_hash($key);
        if (!isset($this->data[$address])) {
            return null;
        }
        foreach ($this->data[$address] as $item) {
            if ($item[0] === $key) {
                return $item[1];
            }
        }
        return null;
    }

    private function _hash(string $key): string {
        $hash = 0;
        for ($i = 0; $i < strlen($key); $i++) {
            $hash = ($hash + ord($key[$i]) * $i) % count($this->data);
        }
        return $hash;
    }

}

$myHashTable = new HashTable(50);
$myHashTable->set('grapes', 10000);
$myHashTable->set('bananas', 10);
$myHashTable->set('apples', 9);

var_dump(["grapes" => $myHashTable->get('grapes')]);
var_dump([ "apples" => $myHashTable->get('apples')]);
var_dump(["bananas" => $myHashTable->get('bananas')]);

