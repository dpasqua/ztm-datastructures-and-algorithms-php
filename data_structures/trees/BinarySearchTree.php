<?php

class Node {
    public $value;
    public ?Node $left;
    public ?Node $right;

    public function __construct($value)
    {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class BinarySearchTree
{
    public ?Node $root;

    public function __construct()
    {
        $this->root = null;
    }

    public function insert(int $value): self {
        if($this->root === null) {
            $this->root = new Node($value);
            return $this;
        }

        $current = $this->root;

        while(true) {
            if($value <= $current->value) {
                if($current->left === null) {
                    $current->left = new Node($value);
                    return $this;
                } else {
                    $current = $current->left;
                }
            } else {
                if($current->right === null) {
                    $current->right = new Node($value);
                    return $this;
                } else {
                    $current = $current->right;
                }
            }
        }
    }

    public function lookup($value): ?Node {
        if($this->root === null) {
            return null;
        }

        $current = $this->root;
        while($current != null) {
            if($current->value == $value) {
                return $current;
            }

            if($value < $current->value) {
                $current = $current->left;
            } else {
                $current = $current->right;
            }
        }

        return null;
    }

    public function remove($value): bool
    {
        if ($this->root === null) {
            return false;
        }

        $current = $this->root;
        $parent = null;

        while ($current) {
            if ($value < $current->value) {
                $parent = $current;
                $current = $current->left;
            } else if ($value > $current->value) {
                $parent = $current;
                $current = $current->right;
            } else if ($current->value == $value) {
                //Option 1: No right child:
                if ($current->right === null) {
                    if ($parent === null) {
                        $this->root = $current->left;
                    } else {
                        if ($current->value < $parent->value) {
                            $parent->left = $current->left;
                        } else if ($current->value > $parent->value) {
                            $parent->right = $current->left;
                        }
                    }
                } else if ($current->right->left === null) {  //Option 2: Right child which doesnt have a left child
                    $current->right->left = $current->left;
                    if ($parent === null) {
                        $this->root = $current->right;
                    } else {
                        if ($current->value < $parent->value) {
                            $parent->left = $current->right;
                        } else if ($current->value > $parent->value) {
                            $parent->right = $current->right;
                        }
                    }
                } else { //Option 3: Right child that has a left child
                    $leftMost = $current->right->left;
                    $leftMostParent = $current->right;

                    while ($leftMost->left !== null) {
                        $leftMostParent = $leftMost;
                        $leftMost = $leftMost->left;
                    }

                    $leftMostParent->left = $leftMost->right;
                    $leftMost->left = $current->left;
                    $leftMost->right = $current->right;

                    if ($parent === null) {
                        $this->root = $leftMost;
                    } else {
                        if ($current->value < $parent->value) {
                            $parent->left = $leftMost;
                        } else if ($current->value > $parent->value) {
                            $parent->right = $leftMost;
                        }
                    }
                }
                return true;
            }
        }
        return false;
    }
}

$tree = new BinarySearchTree();
$tree->insert(9);
$tree->insert(4);
$tree->insert(6);
$tree->insert(20);
$tree->insert(170);
$tree->insert(15);
$tree->insert(1);

function traverse(Node $node) {
    $tree = new \stdClass();
    $tree->value = $node->value ;
    $tree->left = $node->left === null ? null : traverse($node->left);
    $tree->right = $node->right === null ? null : traverse($node->right);
    return $tree;
}

echo json_encode($tree->lookup(20)) . "\n";
echo json_encode(traverse($tree->root)) . "\n";

//     9
//  4     20
//1  6  15  170