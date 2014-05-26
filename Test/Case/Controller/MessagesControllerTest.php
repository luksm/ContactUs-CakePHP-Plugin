<?php
App::uses('MessagesController', 'ContactUs.Controller');

/**
 * MessagesController Test Case
 *
 */
class MessagesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.contact_us.message',
		'plugin.contact_us.city',
		'plugin.contact_us.state',
		'plugin.contact_us.country',
		'plugin.contact_us.neighbourhood',
		'plugin.contact_us.address'
	);

}
