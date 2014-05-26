<?php
/**
* Routes for the ContactUs plugin
*/
Router::connect(
    '/contact-us',
    array('plugin' => 'ContactUs', 'controller' => 'messages', 'action' =>'add')
);
Router::connect(
    '/admin/messages',
    array('plugin' => 'ContactUs', 'controller' => 'messages', 'admin' => true)
);
Router::connect(
    '/admin/messages/:action/*',
    array('plugin' => 'ContactUs', 'controller' => 'messages', 'admin' => true)
);
Router::connect(
    '/admin/contactus/messages/:action/*',
    array('plugin' => 'ContactUs', 'controller' => 'messages', 'admin' => true)
);
Router::connect(
    '/admin/recipients',
    array('plugin' => 'ContactUs', 'controller' => 'recipients', 'admin' => true)
);
Router::connect(
    '/admin/recipients/:action/*',
    array('plugin' => 'ContactUs', 'controller' => 'recipients', 'admin' => true)
);
Router::connect(
    '/admin/recipients/messages/:action/*',
    array('plugin' => 'ContactUs', 'controller' => 'recipients', 'admin' => true)
);
