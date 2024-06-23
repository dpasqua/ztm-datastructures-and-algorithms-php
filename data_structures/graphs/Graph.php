<?php

namespace graphs;

class Graph
{
    private int $numberOfNodes = 0;
    private array $adjacentList = [];

    public function addVertex($node): bool {
        if(!array_key_exists($node, $this->adjacentList)) {
            $this->adjacentList[$node] = [];
            $this->numberOfNodes++;
            return true;
        }
        return false;
    }

    public function addEdge($node1, $node2) {
        if(array_key_exists($node1, $this->adjacentList)) {
            $this->adjacentList[$node1][] = $node2;
            $this->adjacentList[$node1] = array_unique($this->adjacentList[$node1]);
        }
        if(array_key_exists($node2, $this->adjacentList)) {
            $this->adjacentList[$node2][] = $node1;
            $this->adjacentList[$node2] = array_unique($this->adjacentList[$node2]);
        }
    }

    /**
     * @return int
     */
    public function getNumberOfNodes(): int
    {
        return $this->numberOfNodes;
    }

    public function showConnections() {
        $nodes = array_keys($this->adjacentList);
        foreach($nodes as $node) {
            $connections = '';
            $nodeConnections = $this->adjacentList[$node];
            
            foreach($nodeConnections as $vertex) {
                $connections .= $vertex . " ";
            }
            echo $node . "-->" . $connections . "\n";
        }
    }
}

$myGraph = new Graph();
$myGraph->addVertex('0');
$myGraph->addVertex('1');
$myGraph->addVertex('2');
$myGraph->addVertex('3');
$myGraph->addVertex('4');
$myGraph->addVertex('5');
$myGraph->addVertex('6');
$myGraph->addEdge('3', '1');
$myGraph->addEdge('3', '4');
$myGraph->addEdge('4', '2');
$myGraph->addEdge('4', '5');
$myGraph->addEdge('1', '2');
$myGraph->addEdge('1', '0');
$myGraph->addEdge('0', '2');
$myGraph->addEdge('6', '5');
$myGraph->addEdge('6', '5');

var_dump($myGraph->getNumberOfNodes()); //7

$myGraph->showConnections();
//Answer:
// 0-->1 2
// 1-->3 2 0
// 2-->4 1 0
// 3-->1 4
// 4-->3 2 5
// 5-->4 6
// 6-->5