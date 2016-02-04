<?class Paginator{
    var $items_per_page = 5;
    var $items_total;
    var $sn;    
    var $current_page;
    var $num_pages;
    var $mid_range;
    var $low;
    var $high;
    var $limit;
    var $return;
    var $default_ipp = 5;
    var $labelPrevious = "";
    var $labelNext = "";

    function Paginator()
    {
        $this->current_page = 1;
        $this->mid_range = 3;
        $this->items_per_page = (!empty($_GET['ipp'])) ? $_GET['ipp']:$this->default_ipp;        
    }

    function paginate()
    {
        if($_GET['ipp'] == 'All')
        {
            $this->num_pages = ceil($this->items_total/$this->default_ipp);
            $this->items_per_page = $this->default_ipp;
        }
        else
        {
            if(!is_numeric($this->items_per_page) OR $this->items_per_page <= 0) $this->items_per_page = $this->default_ipp;
            $this->num_pages = ceil($this->items_total/$this->items_per_page);
        }
        $this->current_page = (int) $_GET['id1']; // must be numeric > 0
        if($this->current_page < 1 Or !is_numeric($this->current_page)) $this->current_page = 1;
        if($this->current_page > $this->num_pages) $this->current_page = $this->num_pages;
        $prev_page = $this->current_page-1;
        $next_page = $this->current_page+1;

        if($this->num_pages > 1)
        {
        	$this->return = ($this->current_page != 1 And $this->items_total >= 5) ? "<ul class=\"pagination\"><li><a href=\"".$this->sn."".$prev_page.".html\">« ".$this->labelPrevious."</a></li> " : "<ul class=\"pagination\"><li class=\"disabled\"><a href=\"#\">« ".$this->labelPrevious."</a></li> ";

            $this->start_range = $this->current_page - floor($this->mid_range/2);
            $this->end_range = $this->current_page + floor($this->mid_range/2);

            if($this->start_range <= 0)
            {
                $this->end_range += abs($this->start_range)+1;
                $this->start_range = 1;
            }
            if($this->end_range > $this->num_pages)
            {
                $this->start_range -= $this->end_range-$this->num_pages;
                $this->end_range = $this->num_pages;
            }
            $this->range = range($this->start_range,$this->end_range);

            for($i=1;$i<=$this->num_pages;$i++)
            {
                //if($this->range[0] > 2 And $i == $this->range[0]) $this->return .= " <span class=\"just_blue\">...</span> ";
                // loop through all pages. if first, last, or in range, display
                if($i==1 Or $i==$this->num_pages Or in_array($i,$this->range))
                {
                    $this->return .= ($i == $this->current_page And $_GET['id1'] != 'All') ? "<li class=\"active\"><a title=\"Go to page $i of $this->num_pages\" href=\"#\">$i <span class=\"sr-only\">(current)</span></a></li>" : "<li><a title=\"Go to page $i of $this->num_pages\" href=\"".$this->sn."".$i.".html\">$i</a></li>";
                }
                //if($this->range[$this->mid_range-1] < $this->num_pages-1 And $i == $this->range[$this->mid_range-1]) $this->return .= " <span class=\"just_blue\">...</span> ";
            }
            $this->return .= (($this->current_page != $this->num_pages And $this->items_total >= 5) And ($_GET['id1'] != 'All')) ? "<li ><a href=\"".$this->sn."".$next_page.".html\">".$this->labelNext." »</a></li>\n" : "<li class=\"disabled\"><a href=\"#\">".$this->labelNext." »</a></li>\n";
        }
        else
        {
            for($i=1;$i<=$this->num_pages;$i++)
            {
                $this->return .= ($i == $this->current_page) ? "<li class=\"active\"><a href=\"#\">$i <span class=\"sr-only\">(current)</span></a></li>":"<li><a href=\"".$this->sn."".$i.".html\">$i</a></li> ";
            }
        }
        $this->return .= "</ul>";
        $this->low = ($this->current_page-1) * $this->items_per_page;
        $this->high = ($_GET['ipp'] == 'All') ? $this->items_total:($this->current_page * $this->items_per_page)-1;
        $this->limit = ($_GET['ipp'] == 'All') ? "":" LIMIT $this->low,$this->items_per_page";
    }
    
    function display_pages()
    {
        return $this->return;
    }
    
    function truncate($string, $limit, $break=".", $pad="...") {
    	// return with no change if string is shorter than $limit
    	if(strlen($string) <= $limit) return $string;
    	// is $break present between $limit and the end of the string?
    	if(false !== ($breakpoint = strpos($string, $break, $limit)))
    	{ if($breakpoint < strlen($string) - 1)
    	{ $string = substr($string, 0, $breakpoint) . $pad; } }
    
    	if (strlen($string) < 400)
    	{
    	return $string;
    	}
    
    
    
    	// return with no change if string is shorter than $limit
    	if(strlen($string) <= $limit) return $string;
    
    	$string = substr($string, 0, $limit);
    	if(false !== ($breakpoint = strrpos($string, $break))) {
    	$string = substr($string, 0, $breakpoint);
    	}
    
    	return $string . $pad;
    }
}
?>