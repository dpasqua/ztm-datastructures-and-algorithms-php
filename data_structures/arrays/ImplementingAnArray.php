<?php

class MyArray {
    private int $length = 0;
    private array $data = [];

    public function get(int $index) {
        return $this->data[$index];
    }

    public function push($item): int {
        $this->data[$this->length] = $item;
        $this->length++;
        return $this->length;
    }

    public function pop() {
        $lastItem = $this->data[$this->length - 1];
        unset($this->data[$this->length - 1]);
        $this->length--;
        return $lastItem;
    }

    public function delete(int $index) {
        $item = $this->data[$index];
        $this->shiftItems($index);
        return $item;
    }

    private function shiftItems(int $index) {
        for ($i = $index; $i < $this->length - 1; $i++) {
            $this->data[$i] = $this->data[$i + 1];
        }
        unset($this->data[$this->length - 1]);
        $this->length--;
    }
}

$myArray = new MyArray();

$myArray->push('hi');
$myArray->push('you');
$myArray->push('!');
$myArray->push(10);
$myArray->push(20);
$myArray->push(30);

$myArray->pop();
$myArray->delete(1);

var_dump($myArray->get(1)); // !
var_dump($myArray);

