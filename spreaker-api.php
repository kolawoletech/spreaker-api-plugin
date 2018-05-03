<?php
/**
 * @package SpreakerAPIPlugin
 */
/*
Plugin Name: Spreaker API PLugin
Plugin URI: https://newbietech.com.ng/
Description: Used by millions, Akismet is quite possibly the best way in the world to <strong>protect your blog from spam</strong>. It keeps your site protected even while you sleep. To get started: activate the Akismet plugin and then go to your Akismet Settings page to set up your API key.
Version: 1.0.0
Author: Kolawole Olulana
Author URI: https://newbietech.com.ng/
License: GPLv2 or later
Text Domain: spreaker-plugin
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

// Make sure we don't expose any info if called directly
if ( ! defined( 'ABSPATH' ) ) {
    
    die;
} 

class SpreakerAPIPlugin
{
    function __construct(){
        add_action( 'init', array( $this, 'custom_post_type') );
    }
    //methods
    function activate(){
        $this -> custom_post_type();
        flush_rewrite_rules();
    }

    function deactivate(){
        flush_rewrite_rules();
    }

    function custom_post_type(){
        register_post_type( 'book', ['public'=>true, 'label'=> 'Books'] );
    }

    function enqueue(){
        
    }
}

if ( class_exists('SpreakerAPIPlugin')){
    $spreakerApiPlugin = new SpreakerAPIPlugin();
}

//activation
register_activation_hook( __FILE__, array( $spreakerApiPlugin, 'activate') );

//deactivation
register_deactivation_hook( __FILE__, array( $spreakerApiPlugin, 'deactivate') );

//uninstall
// register_uninstall_hook( __FILE__, array( $spreakerApiPlugin, 'uninstall') );
