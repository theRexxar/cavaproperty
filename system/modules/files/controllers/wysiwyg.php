<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wysiwyg extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('file_folders_model');
		$this->load->model('file_model');
		$this->lang->load('files');
		$this->lang->load('wysiwyg');		

		$this->config->load('files');
		$this->_path = FCPATH . $this->config->item('files_folder');
		
		Assets::add_module_js('files', 'wysiwyg.js');
		Assets::add_module_css('files', 'wysiwyg.css');
		
		// If the folder hasn't been created by the files module create it now
		is_dir($this->_path) OR mkdir($this->_path, 0777, TRUE);
		
	}

	public function upload()
	{
		$this->form_validation->set_rules('name',lang('file_folders.name_label'),'required|trim|xss_clean|max_length[250]');			
		$this->form_validation->set_rules('description',lang('file_folders.description_label'),'trim|xss_clean|max_length[250]');
		$this->form_validation->set_rules('folder_id',lang('file_folders.parent_label'),'required|trim|is_numeric|max_length[11]');	
		$this->form_validation->set_rules('type',lang('file_folders.type'),'required|trim');	
		
		if ($this->form_validation->run())
		{
			// Setup upload config
			$type		= $this->input->post('type');
			$allowed	= $this->config->item('files_allowed_file_ext');

			$config['upload_path']		= $this->_path;
			$config['allowed_types']	= implode('|', $allowed[$type]);
			
			
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
			{
        Template::set_message($this->upload->display_errors(), 'error');
			}
			else
			{
				$img = array('upload_data' => $this->upload->data());

				$this->file_model->insert(array(
					'folder_id'		=> $this->input->post('folder_id'),
					'user_id'		=> $this->current_user->id,
					'type'			=> $type,
					'name'			=> $this->input->post('name'),
					'description'	=> $this->input->post('description') ? $this->input->post('description') : '',
					'filename'		=> $img['upload_data']['file_name'],
					'extension'		=> $img['upload_data']['file_ext'],
					'mimetype'		=> $img['upload_data']['file_type'],
					'filesize'		=> $img['upload_data']['file_size'],
					'width'			=> (int) $img['upload_data']['image_width'],
					'height'		=> (int) $img['upload_data']['image_height'],
				));
        Template::set_message(sprintf(lang('files.create_success'), $img['upload_data']['file_name']), 'success');
			}
			redirect(SITE_AREA."/content/files/wysiwyg/{$this->input->post('redirect_to')}/{$this->input->post('folder_id')}");
		}
	}
	
	public function image($id = 0)
	{
		$data['folders']			= $this->file_folders_model->get_folders();
		$data['subfolders']		= array();
		$data['current_folder']	= $id && isset($data['folders'][$id])
								? $data['folders'][$id]
								: ($data['folders'] ? current($data['folders']) : array());

		if ($data['current_folder'])
		{
			$data['current_folder']->items = $this->file_model->order_by('date_added', 'desc')->where('type', 'i')->find_all_by('folder_id', $data['current_folder']->id);

			$subfolders = $this->file_folders_model->folder_tree($data['current_folder']->id);

			foreach ($subfolders as $subfolder)
			{
				$data['subfolders'][$subfolder->id] = repeater('&raquo; ', $subfolder->depth) . $subfolder->name;
			}

			// Set a default label
			$data['subfolders'] = $data['subfolders']
				? array($data['current_folder']->id => lang('files.dropdown_root')) + $data['subfolders']
				: array($data['current_folder']->id => lang('files.dropdown_no_subfolders'));
		}

		// Array for select
		$data['folders_tree'] = array();
		foreach ($data['folders'] as $folder)
		{
			$data['folders_tree'][$folder->id] = repeater('&raquo; ', $folder->depth) . $folder->name;
		}

		Template::set('data', $data);
		Template::set('editor_path', js_path().'editor/ckeditor/');
		Template::set('toolbar_title', 'Images');
		Template::set_view('wysiwyg/image');
		Template::render('wysiwyg', true);
	}

	public function file($id = 0)
	{
		$data['folders']				= $this->file_folders_model->get_folders();
		$data['subfolders']			= array();
		$data['current_folder']	= $id && isset($data['folders'][$id])
								? $data['folders'][$id]
								: ($data['folders'] ? current($data['folders']) : array());

		if ($data['current_folder'])
		{
			$data['current_folder']->items = $this->file_model
				->order_by('date_added', 'DESC')
				->where('type !=', 'i')
				->find_all_by('folder_id', $data['current_folder']->id);

			$subfolders = $this->file_folders_model->folder_tree($data['current_folder']->id);

			foreach ($subfolders as $subfolder)
			{
				$data['subfolders'][$subfolder->id] = repeater('&raquo; ', $subfolder->depth) . $subfolder->name;
			}

			// Set a default label
			$data['subfolders'] = $data['subfolders']
				? array($data['current_folder']->id => lang('files.dropdown_root')) + $data['subfolders']
				: array($data['current_folder']->id => lang('files.dropdown_no_subfolders'));
		}

		// Array for select
		$data['folders_tree'] = array();
		foreach ($data['folders'] as $folder)
		{
			$data['folders_tree'][$folder->id] = repeater('&raquo; ', $folder->depth) . $folder->name;
		}

		$data['file_types'] = array(
			'a' => lang('files.type_a'),
			'v' => lang('files.type_v'),
			'd' => lang('files.type_d'),
			'i' => lang('files.type_i'),
			'o' => lang('files.type_o')
		);

		Template::set('data', $data);
		Template::set('editor_path', js_path().'editor/ckeditor/');
		Template::set('toolbar_title', 'Files');
		Template::set_view('wysiwyg/file');
		Template::render('wysiwyg', true);
	}

	public function ajax_get_file()
	{
		$file = $this->file_model->find($this->input->post('file_id'));

		$folders = array();
		if ($folder_id = $this->input->post('folder_id'))
		{
			$folders = $this->file_folders_model->get_folder_path($folder_id);
		}

		$this->load->view('wysiwyg/ajax_current_file', array(
			'file'		=> $file,
			'folders'	=> $folders
		));
	}

}