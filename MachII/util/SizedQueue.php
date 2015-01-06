<?php
/**
 * @package Util
 * @subpackage MachII_util_Queue
 */
/**
 * 
 */
require_once 'MachII/util/Queue.php';

/**
 * A specialization of Queue to limit size.
 * @package Util
 * @subpackage MachII_util_Queue
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_util_SizedQueue extends MachII_util_Queue
{
    /**
     * @access private
     * @var integer
     */
    var $_maxSize;
    
    /**
     * Initializes the queue.
     * @param integer
     */
    function MachII_util_SizedQueue($maxSize = 100)
    {
        $this->setMaxSize($maxSize);
    }
    
    /**
     * Queues the item.
     * @param mixed
     * @return boolean
     */
    function put(&$item)
    {
        if ($this->isFull()) {
            return false;
        } else {
            parent::put($item);
            return true;
        }
    }
    
    /**
     * Sets the maximum size of the queue.
     * @param integer
     */
    function setMaxSize($maxSize)
    {
        $this->_maxSize = $maxSize;
    }
    
    /**
     * Returns the maximum size of the queue.
     * @return integer
     */
    function getMaxSize()
    {
        return $this->_maxSize;
    }
    
    /**
     * Returns whether or not the queue is full.
     * @return boolean
     */
    function isFull()
    {
        return ($this->getSize() == $this->getMaxSize());
    }

}

?>
