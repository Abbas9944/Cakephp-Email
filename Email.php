<?php
date_default_timezone_set('asia/kolkata');
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
App::uses('CakeEmail', 'Network/Email');
App::import('Vendor','xtcpdf');
// App::import('Vendor', 'dompdf',array('file'=>'dompdf_config.inc.php'));
// App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
ini_set('memory_limit', '256M');
set_time_limit(0);
class HandlerController extends AppController
{
	public $helper=array('html', 'form', 'Js');

	public $components = array(
    'Paginator',
    'Session','Cookie','RequestHandler'
 	);
	
	
	//////////////////////////////////////////////////////////////--------------- Authentication  Start------------------------//////////////////////////////////////////////
	 public function beforeFilter() {
       Configure::write('debug',0);
    } 

	public function email_ticket(){
		$attachments = array(
			'Marvel Invoice.pdf'	=> array(
			'file'	=> '/var/www/html/app/webroot/Invoice.pdf',
			'mimetype'	=> 'pdf'
		));
		$Email = new CakeEmail();
		$Email->config('smtp');
		$Email->to($email)
			  ->attachments($attachments)
		      ->subject('Invoice')
		      ->send('Marvel Water Park Ticket');
		// $Email = new CakeEmail();
		// $Email->config('smtp');
		// $Email->to($email)
		//       ->subject('Invoice')
		//       ->send('The page is on testing mode');
	}
	//////////////////////  End Php Function  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}
?>
