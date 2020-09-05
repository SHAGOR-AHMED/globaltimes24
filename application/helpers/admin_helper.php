<?php

function getAllcategory(){
	
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')->from('category')->get()->result();

    foreach ($data as $d) {
        echo '<option value="' . $d->cat_id . '" />  ' . $d->category . '<br />';
    }
}

function getAllSubcatByCatId($cat_id){
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')->from('subcategory')->where('subcat_catid', $cat_id)->get()->result();
    $out = '';
    foreach ($data as $dd) {
        $out .= '<option value="' . $dd->subcat_id . '" >  ' . $dd->subcategory . '</option><br />';
    }
    echo empty($out) ? 'Not Set' : $out;
}

function SelectedCategory($val){
    
    switch ($val) {
        case 1:
            echo "Main Page";
            break;
        case 2:
            echo "Right Side";
            break;
        default:
            echo "";
    }
}

function SelectedPosition($val){
    
    switch ($val) {
        case 1:
            echo "One";
            break;
        case 2:
            echo "Two";
            break;
        case 3:
            echo "Three";
            break;
        case 4:
            echo "Four";
            break;
        default:
            echo "";
    }
}

function SelectedUserType($val){
    
    switch ($val) {
        case 1:
            echo "Admin";
            break;
        case 2:
            echo "Editor";
            break;
        case 3:
            echo "Reporter";
            break;
        default:
            echo "";
    }
}

function SelectedUserStatus($val){
    
    switch ($val) {
        case 1:
            echo "Active";
            break;
        case 2:
            echo "Inactive";
            break;
        default:
            echo "";
    }
}