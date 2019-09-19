<?php
class ControllerCommonatnewsletter extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('catalog/category');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('common/atnewsletter');
		$this->model_common_atnewsletter->createatnewsletter();
		
		$this->getList();
	}

	protected function getList() {
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL')
		);

	
		$data['export'] = $this->url->link('common/atnewsletter/export', 'user_token=' . $this->session->data['user_token'], 'SSL');
		
		$data['cancel'] = $this->url->link('extension/module/atnewsletters', 'user_token=' . $this->session->data['user_token'], 'SSL');

		$data['heading_title'] = "atnewsletters";

		$data['text_list'] = "E-mails";
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');

		$data['column_name'] = $this->language->get('column_name');
		$data['column_sort_order'] = $this->language->get('column_sort_order');
		$data['column_action'] = $this->language->get('column_action');

		$data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_rebuild'] = $this->language->get('button_rebuild');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		
		
		
	
		$result=$this->model_common_atnewsletter->getatnewsletter();
		
		$data['newsltr'] = array();
		foreach($result as $res)
		{
			$data['newsltr'][] = array(
			'news_id' => $res['news_id'],
			'news_email' => $res['news_email'],
			'date_added' => $res['date_added'],
			);
		}
	

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('common/atnewsletter', $data));
	}
	
	
	
	public function export() {
		
		$this->load->model('common/atnewsletter');
		$temp_data = $this->model_common_atnewsletter->export();
		
		
		/* CSV Header Starts Here */
 
		header("Content-Type: text/csv");
		header("Content-Disposition: attachment; filename=NewsletterCSV-".date('d-m-Y').".csv");
		// Disable caching
		header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
		header("Pragma: no-cache"); // HTTP 1.0
		header("Expires: 0"); // Proxies
		 
		/* CSV Header Ends Here */
		 
		$output = fopen("php://output", "w"); //Opens and clears the contents of file; or creates a new file if it doesn't exist
		 
		$data[] = array(); 
 
			// We don't want to export all the information to be exported so maintain a separate array for the information to be exported
			foreach($temp_data as $data)
			{
				$data[] = array(
				 	'news_email' => $data['news_email'],
				   'date_added' => $data['date_added']
			   );		
			}
			
			
 			
			// Exporting the CSV
			foreach($temp_data as $row)
			{
				fputcsv($output, $row); // here you can change delimiter/enclosure
			}
 
		fclose($output); // Closing the File
		
	//$this->response->setOutput($this->model_common_atnewsletter->export());	
		
	}

}	