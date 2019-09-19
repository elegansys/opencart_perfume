<?php



class ControllerExtensionModuleATFOOTER extends Controller {



	public function index($setting) {




		if (isset($setting['module_description'][$this->config->get('config_language_id')])) {



			$data['heading_title'] = html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['title'], ENT_QUOTES, 'UTF-8');



			$data['athtml1'] = html_entity_decode($setting['module_description1'][$this->config->get('config_language_id')]['description1'], ENT_QUOTES, 'UTF-8');



			$data['athtml2'] = html_entity_decode($setting['module_description2'][$this->config->get('config_language_id')]['description2'], ENT_QUOTES, 'UTF-8');


			$data['athtml3'] = html_entity_decode($setting['module_description3'][$this->config->get('config_language_id')]['description3'], ENT_QUOTES, 'UTF-8');


			$data['athtml4'] = html_entity_decode($setting['module_description4'][$this->config->get('config_language_id')]['description4'], ENT_QUOTES, 'UTF-8');




			return $this->load->view('extension/module/atfooter', $data);

		}



	}



}