<?php
/**
 * @package Util
 * @subpackage MachII_util_Queue
 */
/**
 * @package Util
 * @subpackage MachII_util_Queue
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_util_Queue
{
    /**
     * Initializes the queue.
     * @access private
     * @var array
     */
    var $_queueArray = array();
    
    
    /**
     * Queues the item.
     * @param mixed
     */
    function put(&$item)
    {
        $this->_queueArray[] =& $item;
        //array_push($this->queueArray, $item);
    }
    
    /**
     * Dequeues and returns the next item in the queue.
     * @return mixed
     */
    function &get()
    {
        $nextItem =& $this->_queueArray[0];
        array_shift($this->_queueArray);
        
        return $nextItem;
    }
    
    /**
     * Peeks the next item in the queue without removing it.
     * @return mixed
     */
    function &peek()
    {
        return $this->_queueArray[0];
    }
    
    /**
     * Clears the queue.
     */
    function clear()
    {
        $this->_queueArray = array();
    }
    
    /**
     * Returns the size of the queue (number of elements).
     * @return integer
     */
    function getSize()
    {
        return count($this->_queueArray);
    }
    
    /**
     * Returns whether or not the queue is empty.
     * @return boolean
     */
    function isEmpty()
    {
        return empty($this->_queueArray);
    }

}

?>
