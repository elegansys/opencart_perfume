<?php
class ControllerExtensionModuleatnewsletters extends Controller {
	public function index() {
		$this->load->language('extension/module/atnewsletter');
		$this->load->model('module/atnewsletters');
		
		$this->model_module_atnewsletters->createatnewsletter();
	
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_brands'] = $this->language->get('text_brands');
		$data['text_index'] = $this->language->get('text_index');
		$data['text_button_submit'] = $this->language->get('text_button_submit');
        $data['text_placeholder_input'] = $this->language->get('text_placeholder_input');
		$data['text_placeholder_inputname'] = $this->language->get('text_placeholder_inputname');
		$data['offer_text'] = $this->language->get('offer_text');
		
		$data['brands'] = array();
		
			return $this->load->view('extension/module/atnewsletters', $data);
		
	}
	public function subscribe()
	{
		$this->load->model('module/atnewsletters');
		
		$json = array();
		$json['message'] = $this->model_module_atnewsletters->subscribes($this->request->post);
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
		
	}
	
}
