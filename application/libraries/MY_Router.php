<?php

// class MY_Router extends CI_Router {

//     protected function _set_routing() {

//         if (file_exists(APPPATH.'config/routes.php'))
//         {
//             include(APPPATH.'config/routes.php');
//         }

//         if (file_exists(APPPATH.'config/'.ENVIRONMENT.'/routes.php'))
//         {
//             include(APPPATH.'config/'.ENVIRONMENT.'/routes.php');
//         }

//         // Validate & get reserved routes
//         if (isset($route) && is_array($route))
//         {
//             isset($route['default_controller']) && $this->default_controller = $route['default_controller'];
//             isset($route['translate_uri_dashes']) && $this->translate_uri_dashes = $route['translate_uri_dashes'];
//             unset($route['default_controller'], $route['translate_uri_dashes']);
//             $this->routes = $route;
//         }

//         if ($this->enable_query_strings) {

//             if ( ! isset($this->directory))
//             {

//                 $_route = $this->config->item('route_trigger');
//                 $_route = isset($_GET[$_route]) ? trim($_GET[$_route], " \t\n\r\0\x0B/") : '';

//                 if ($_route !== '')
//                 {
//                     $part = explode('/', $_route);

//                     if ( ! empty($part[1])) {

//                         if (file_exists(APPPATH . 'controllers/' . $part[0] . '/' . ucfirst($part[1]) . '.php')) {

//                             $this->uri->filter_uri($part[0]);
//                             $this->set_directory($part[0]);

//                             $this->uri->filter_uri($part[1]);
//                             $this->set_class($part[1]);

//                             $_f = trim($this->config->item('function_trigger'));

//                             if ( ! empty($_GET[$_f])) {
//                                 $this->uri->filter_uri($_GET[$_f]);
//                                 $this->set_method($_GET[$_f]);
//                             }

//                             $this->uri->rsegments = array(
//                                 1 => $this->class,
//                                 2 => $this->method
//                             );

//                         } else {

//                             $this->uri->filter_uri($part[0]);
//                             $this->set_directory($part[0]);
//                             $this->set_class($part[0]);
          
//                             $this->uri->filter_uri($part[1]);
//                             $this->set_method($part[1]);    

//                             $this->uri->rsegments = array(
//                                 1 => $this->class,
//                                 2 => $this->method
//                             );

//                         }
//                     }

//                 } else {

//                     $this->_set_default_controller();
//                 }
//             }

//             // Routing rules don't apply to query strings and we don't need to detect
//             // directories, so we're done here
//             return;
//         }

//         // Is there anything to parse?
//         if ($this->uri->uri_string !== '')
//         {
//             $this->_parse_routes();
//         }
//         else
//         {
//             $this->_set_default_controller();
//         }
//     }
// } 