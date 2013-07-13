<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function nextprevlink($offset,$view_per_page,$total_rows,$archive_link)
{
    $link=array();
    
	if($offset > 0)
	{
		$prev=$offset-$view_per_page;
		$link['prev_link']=$archive_link.$prev;
	}
	if($offset <= ($total_rows-(1+$view_per_page)) )
	{
		$next=$offset+$view_per_page;
		$link['next_link']=$archive_link.$next;
	}
	return $link;
}

function nextprevlink_page($offset,$view_per_page,$total_rows,$archive_link)
{
    $link=array();
    
	if($offset > 1)
	{
		$prev=$offset-1;
		$link['prev_link']=$archive_link.$prev;
	}
	if($offset < ceil($total_rows/$view_per_page) && $total_rows > $view_per_page )
	{
        if($offset == "")
        {
            $offsets = 1;
        }
        else
        {
            $offsets = $offset;
        }
		$next=$offsets+1;
		$link['next_link']=$archive_link.$next;
	}
	return $link;
}