<?php
class ControllerExtensionModuleAtFooter extends Controller {

	private $error = array();



	public function index() {

		$this->load->language('extension/module/atfooter');



		$this->document->setTitle($this->language->get('heading_title'));



		$this->load->model('setting/module');



		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {

			if (!isset($this->request->get['module_id'])) {

				$this->model_setting_module->addModule('atfooter', $this->request->post);

			} else {

				$this->model_setting_module->editModule($this->request->get['module_id'], $this->request->post);

			}



			$this->session->data['success'] = $this->language->get('text_success');



			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));

		}



		$data['heading_title'] = $this->language->get('heading_title');



		$data['text_edit'] = $this->language->get('text_edit');

		$data['text_enabled'] = $this->language->get('text_enabled');

		$data['text_disabled'] = $this->language->get('text_disabled');



		$data['entry_name'] = $this->language->get('entry_name');

		$data['entry_title'] = $this->language->get('entry_title');

		$data['entry_description1'] = $this->language->get('entry_description1');

		$data['entry_description2'] = $this->language->get('entry_description2');

		$data['entry_description3'] = $this->language->get('entry_description3');

		$data['entry_description4'] = $this->language->get('entry_description4');




		$data['entry_status'] = $this->language->get('entry_status');

		

		$data['entry_Column1'] = $this->language->get('entry_Column1');

		$data['entry_Column2'] = $this->language->get('entry_Column2');

		$data['entry_Column3'] = $this->language->get('entry_Column3');

		$data['entry_Column4'] = $this->language->get('entry_Column4');



		$data['button_save'] = $this->language->get('button_save');

		$data['button_cancel'] = $this->language->get('button_cancel');



		if (isset($this->error['warning'])) {

			$data['error_warning'] = $this->error['warning'];

		} else {

			$data['error_warning'] = '';

		}



		if (isset($this->error['name'])) {

			$data['error_name'] = $this->error['name'];

		} else {

			$data['error_name'] = '';

		}



		$data['breadcrumbs'] = array();



		$data['breadcrumbs'][] = array(

			'text' => $this->language->get('text_home'),

			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL')

		);



		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);



		if (!isset($this->request->get['module_id'])) {

			$data['breadcrumbs'][] = array(

				'text' => $this->language->get('heading_title'),

				'href' => $this->url->link('extension/module/atfooter', 'user_token=' . $this->session->data['user_token'], 'SSL')

			);

		} else {

			$data['breadcrumbs'][] = array(

				'text' => $this->language->get('heading_title'),

				'href' => $this->url->link('extension/module/atfooter', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], 'SSL')

			);

		}



		if (!isset($this->request->get['module_id'])) {

			$data['action'] = $this->url->link('extension/module/atfooter', 'user_token=' . $this->session->data['user_token'], 'SSL');

		} else {

			$data['action'] = $this->url->link('extension/module/atfooter', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], 'SSL');

		}



		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);



		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {

			$module_info = $this->model_setting_module->getModule($this->request->get['module_id']);

		}



		if (isset($this->request->post['name'])) {

			$data['name'] = $this->request->post['name'];

		} elseif (!empty($module_info)) {

			$data['name'] = $module_info['name'];

		} else {

			$data['name'] = '';

		}



		if (isset($this->request->post['module_description1'])) {

			$data['module_description1'] = $this->request->post['module_description1'];

		} elseif (!empty($module_info)) {

			$data['module_description1'] = $module_info['module_description1'];

		} else {

			$data['module_description1'] = array();

		}

		

		

		if (isset($this->request->post['module_description2'])) {

			$data['module_description2'] = $this->request->post['module_description2'];

		} elseif (!empty($module_info)) {

			$data['module_description2'] = $module_info['module_description2'];

		} else {

			$data['module_description2'] = array();

		}

		

		if (isset($this->request->post['module_description3'])) {

			$data['module_description3'] = $this->request->post['module_description3'];

		} elseif (!empty($module_info)) {

			$data['module_description3'] = $module_info['module_description3'];

		} else {

			$data['module_description3'] = array();

		}

		if (isset($this->request->post['module_description4'])) {

			$data['module_description4'] = $this->request->post['module_description4'];

		} elseif (!empty($module_info)) {

			$data['module_description4'] = $module_info['module_description4'];

		} else {

			$data['module_description4'] = array();

		}

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();



		if (isset($this->request->post['status'])) {

			$data['status'] = $this->request->post['status'];

		} elseif (!empty($module_info)) {

			$data['status'] = $module_info['status'];

		} else {

			$data['status'] = '';

		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/atfooter', $data));

	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/atfooter')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
			$this->error['name'] = $this->language->get('error_name');
		}

		return !$this->error;
	}

}