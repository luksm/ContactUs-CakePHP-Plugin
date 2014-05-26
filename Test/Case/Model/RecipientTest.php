<?php
App::uses('Recipient', 'ContactUs.Model');

/**
 * Recipient Test Case
 *
 */
class RecipientTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.contact_us.recipient',
		'plugin.contact_us.message'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Recipient = ClassRegistry::init('ContactUs.Recipient');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Recipient);

		parent::tearDown();
	}

}
