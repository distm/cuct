<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

function admin_url($uri='')
{
    return base_url("admin/{$uri}");
}

function assets_url($uri='')
{
    return base_url("assets/{$uri}");
}

function avatar_url($uri='')
{
    return base_url("user-avatar/{$uri}");
}

function avatar_path()
{
    return "D:/WWW-Root/cuct/user-avatar/";
}

function full_url()
{
    return 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
}

function share_url($uri='', $thumb=FALSE)
{
    return $thumb ? base_url("share/thumbs/{$uri}") : base_url("share/fm/{$uri}");
}

function mapNav($nav, $is_child=FALSE, $level=0, $active_data=array())
{
    global $nav_html;
    $ci =& get_instance();
    $dir_uri = $ci->router->directory;
    
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
        if($item['class'] == @$active_data['class'] && $level == 0)
        {
            $active = 'active';
            if(isset($item['active_class']))
            {
                $active = '';
                if(strpos(full_url(), $item['active_class']) !== FALSE)
                {
                    $active = 'active';
                }
            }
        }
        if(@$item['method'] == @$active_data['method'] && $level == 1)
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
            if(strpos($dir_uri, 'admin') !== FALSE)
            {
                $href = admin_url(@$item['class'] .'/'. @$item['method']. '/'. @$item['params']);
            }
            else
            {
                $href = base_url(@$item['class'] .'/'. @$item['method']. '/'. @$item['params']);
            }
            
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

function paging($conf=array())
{
    $default = array(
        'use_page_numbers'=> TRUE,
        'first_link'      => 'First',
        'last_link'       => 'Last',
        
        'next_link'       => '<i class="fa fa-chevron-right"></i>',
        'prev_link'       => '<i class="fa fa-chevron-left"></i>',
        
        'full_tag_open'   => '<ul class="pagination">',
        'full_tag_close'  => '</ul>',
        
        'first_tag_open'  => '<li>',
        'first_tag_close' => '</li>',
        
        'last_tag_open'   => '<li>',
        'last_tag_close'  => '</li>',
        
        'cur_tag_open'    => '<li class="disabled"><a href="#">',
        'cur_tag_close'   => '</a></li>',
        
        'next_tag_open'   => '<li>',
        'next_tag_close'  => '</li>',
        
        'prev_tag_open'   => '<li>',
        'prev_tag_close'  => '</li>',
        
        'num_tag_open'    => '<li>',
        'num_tag_close'   => '</li>',
        
        'class' => 'pagination-clear',
        'sufix' => ''
    );
    $config = array_merge($default, $conf);
    
    // apply class
    if($config['class'])
    {
        $config['full_tag_open'] = '<ul class="pagination '. $config['class'] .'">';
    }
    
    $CI =& get_instance();
    $CI->load->library('pagination');
    $CI->pagination->initialize($config); 

    $paging = $CI->pagination->create_links();
    if(! $paging)
    {
        $paging = '<ul class="pagination '. $config['class'] .'"><li class="disabled"><a href="#">1</a></li></ul>';
    }
    
    // sufix
    if($config['sufix'])
    {
        $paging = preg_replace('/href="http:\/\/(.*?)"/i', 'href="http://$1'. $config['sufix'] .'"', $paging);
    }
    
    return $paging;
}

function pre($str='', $exit=TRUE)
{
    echo '<pre>';
    if($str)
    {
        print_r($str);
    }
    else
    {
        var_dump($str);
    }
    echo '</pre>';
    
    if($exit)
    {
        exit;
    }
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

function print_date($string_date='', $conf=array())
{
    $config = array_merge(
        array(
            'format' => 'd-m-Y h:i:s a',
            'locale' => TRUE,
            'prefix' => '',
            'sufix'  => '',
            'return' => FALSE
        ),
        $conf
    );
    
    // get result
    $result = $string_date ? date($config['format'], strtotime($string_date)) : date($config['format']);
    if($config['locale'] === TRUE)
    {
        $d = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
        $m = array('January','February','March','April','May','June','July','August','September','October','November','December');
        $patern = '/('. implode('|', $d) .'|'. implode('|', $m) .')/i';
        $result = preg_replace_callback($patern, "print_date_localize", $result);
    }
    
    // prefix and sufix
    $result = ($config['prefix'] ? "{$config['prefix']} " : '') . $result . ($config['sufix'] ? " {$config['sufix']}" : '');
    
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