<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Issue extends CI_Controller {


	public function index(){

		$cats = array('dsa','ads');


	$this->form
        ->open()
        ->text('location','Locate the problem', 'trim|xss_clean|required')
        ->text('title','Title', 'trim|xss_clean|required')
        ->textarea('description','Description', 'trim|xss_clean|required||callback_validate_email')
        ->select('password', $cats, 'Category')
        ->iupload('add_photo','Category')
        ->submit('Submit') 
        ->add_class('btn btn-success')   
        ->onsuccess('redirect', 'dashboard')
        ->model('account_model', 'register');

    $data['form'] = $this->form->get();
    $data['errors'] = $this->form->errors;

    $near = $this->input->get('near', TRUE);
    $this->load->frontend('add_issue', $data);
		
	}
}

