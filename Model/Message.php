<?php
App::uses('ContactUsAppModel', 'ContactUs.Model');
App::uses('CakeEmail', 'Network/Email');
/**
 * Message Model
 *
 * @property Recipient $Recipient
 */
class Message extends ContactUsAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'recipient_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sender' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'subject' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Recipient' => array(
			'className' => 'Recipient',
			'foreignKey' => 'recipient_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    /**
     * Called after each successful save operation.
     *
     * @param boolean $created True if this save created a new record
     * @param array $options Options passed from Model::save().
     * @return void
     * @link http://book.cakephp.org/2.0/en/models/callback-methods.html#aftersave
     * @see Model::save()
     */
    public function afterSave($created, $options = array()) {
        $data = $this->data['Message'];
        $recipient = $this->Recipient->findById($data['recipient_id']);
        $Email = new CakeEmail();
        $Email->from(array($data['email'] => $data['sender']));
        $Email->to($recipient['Recipient']['email']);
        $Email->subject($data['subject']);
        $Email->send($data['body']);
    }

}
