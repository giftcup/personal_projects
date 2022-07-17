<?php

class ListNode {
    public $data = null;
    public $next = null;

    public function __construct(string $data = null) {
        $this->data = $data;
    }
}

class LinkedList {
    private $__firstNode = null;
    private $__totalNodes = 0;

    public function insert(string $data = null) {
        $newNode = new ListNode($data);

        if ( $this->__firstNode == null ) {
            $this->__firstNode = &$newNode;
        } 
        else {
            $currentNode = $this->__firstNode;
            while ($currentNode->next !== null) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $newNode;
        }
        
        $this->__totalNodes++;
        return true;
    }

    public function display() {
        echo "Total book titles: " . $this->__totalNodes . "\n";
        $currentNode = $this->__firstNode;
        while ($currentNode != null) {
            echo $currentNode->data . " ";
            $currentNode = $currentNode->next;
        }
    }
}

$list = new LinkedList;

for ($i = 0; $i < 10; $i++) {
    $list->insert($i);
}

$list->display();