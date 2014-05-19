<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

function assets_url($uri='')
{
    return base_url("assets/{$uri}");
}

function mapNav($nav, $is_child=FALSE, $level=0, $active_data=array())
{
    global $nav_html;
    $ci =& get_instance();
    
    $cls = $is_child ? 'dropdown-menu' : 'nav nav-pills nav-stacked';
    if(preg_match('/(admin)/i', $ci->router->directory))
    {
        $cls = 'nav navbar-nav';
    }
    
    $atr = '';
    if($level >= 1)
    {
        $cls = 'dropdown-menu';
        $atr = ' role="menu" aria-labelledby="dropdownSubMenu"';
    }
    
    $nav_html .= '<ul class="'. $cls .'"'. $atr .'>';
    foreach($nav as $item)
    {
        $active = '';
        if($item['class'] == @$active_data['class'])
        {
            $active = 'active';
        }
    
        if(isset($item['children']) && is_array($item['children']) && count($item['children']))
        {
            $cls_li = ($level >= 1) ? 'dropdown-submenu' : 'dropdown';
            $caret = ($cls_li == 'dropdown') ? ' <b class="caret"></b>' : '';
            
            $nav_html .= '<li class="'. $active .' '. $cls_li .'">';
            $nav_html .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'. $item['caption'] . $caret .'</a>';
            mapNav($item['children'], TRUE, ($level+1), $active_data);
            $nav_html .= '</li>'."\n";
        }
        else
        {
            $href = base_url(@$item['class'] .'/'. @$item['method']. '/'. @$item['params']);
            if(isset($item['href']))
            {
                $href = $item['href'];
            }
            
            $nav_html .= '<li class="'. $active .'">';
            $nav_html .= '<a href="'. $href .'" title="'. $item['caption'] .'">'. $item['caption'] .'</a>';
            $nav_html .= '</li>'."\n";
        }
    }
    $nav_html .= '</ul>'."\n";
    
    return $nav_html;
}

function print_date_localize($matches)
{
    $d = array(
        'sunday' => 'Minggu',
        'monday' => 'Senin',
        'tuesday' => 'Selasa',
        'wednesday' => 'Rabu',
        'thursday' => 'Kamis',
        'friday' => 'Jumat',
        'saturday' => 'Sabtu'
    );
    $m = array(
        'january' => 'Januari',
        'february' => 'Februari',
        'march' => 'Maret',
        'april' => 'April',
        'may' => 'Mei',
        'june' => 'Juni',
        'july' => 'Juli',
        'august' => 'Agustus',
        'september' => 'September',
        'october' => 'Oktober',
        'november' => 'November',
        'december' => 'Desember'
    );
    
    $index = strtolower($matches[1]);
    if(isset($d[$index]))
    {
        return $d[$index];
    }
    elseif(isset($m[$index]))
    {
        return $m[$index];
    }
    else
    {
        return $matches[1];
    }
}

function print_date($conf=array())
{
    $config = array_merge(
        array(
            'format' => 'd-m-Y h:i:s a',
            'locale' => TRUE,
            'return' => FALSE
        ),
        $conf
    );
    
    // get result
    $result = date($config['format']);
    if($config['locale'] === TRUE)
    {
        $d = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
        $m = array('January','February','March','April','May','June','July','August','September','October','November','December');
        $patern = '/('. implode('|', $d) .'|'. implode('|', $m) .')/i';
        $result = preg_replace_callback($patern, "print_date_localize", $result);
    }
    
    // send result
    if($config['return'] === TRUE)
    {
        return $result;
    }
    else
    {
        echo $result;
    }
}