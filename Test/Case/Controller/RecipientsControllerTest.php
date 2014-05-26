<?php
App::uses('RecipientsController', 'ContactUs.Controller');

/**
 * RecipientsController Test Case
 *
 */
class RecipientsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.contact_us.recipient',
		'plugin.contact_us.city',
		'plugin.contact_us.state',
		'plugin.contact_us.country',
		'plugin.contact_us.neighbourhood',
		'plugin.contact_us.address'
	);

}
