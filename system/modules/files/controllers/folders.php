<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Folders extends Admin_Controller 
{
	private $data;
	private $_folders = array();
	
	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Files.Content.View');

		$this->load->models(array('file_model', 'file_folders_model'));
		$this->lang->load('files');
		$this->config->load('files');
		
		//Assets::add_module_js('files', 'files.js');
		
		Assets::add_module_css('files', 'jquery.fileupload-ui.css');
		Assets::add_module_css('files', 'files.css');	
		
		$this->init_folder_tree();
	}
	
	private function init_folder_tree()
	{
		$this->_folders = $this->file_folders_model->folder_tree();		
		$this->data['folders_tree'] = array();

		// Array for select
		foreach ($this->_folders as $folder)
		{
			$this->data['folders_tree'][$folder->id] = repeater('&raquo; ', $folder->depth) . $folder->name;
		}
	}

	// ------------------------------------------------------------------------

	public function create()
	{
		if ($submit = $this->input->post('submit'))
		{
			if ($id = $this->save_folders())
			{				
				// log activity
				$this->load->model('activities/activity_model');
				$this->activity_model->log_activity($this->auth->user_id(), 
													lang('file_folders.create_record').': ' . $id . ' : ' . $this->input->ip_address(), 
													'files folders');
				
				// reinit folder tree
				$this->init_folder_tree();
				
				// set message
				Template::set_message(lang("file_folders.create_success"), 'success');
				
				if($submit== 'save_exit')
				{
					redirect(SITE_AREA . '/content/files');			
				}
			}
			else 
			{
				Template::set_message(lang("file_folders.create_error"), 'error');
			}
		}

		$this->data['file_folders'] 	= $this->_folders;
		$this->data['current_id'] 		= 0;		
		
		Assets::add_js(Template::theme_url('js/admin.js'),'external',true);
		Assets::add_js($this->load->view('folders/form_js', null, true), 'inline');
		
		Template::set('data',$this->data);
		Template::set("toolbar_title", "Manage Folder");
		Template::set_view('folders/form');
		Template::render();
	}

	// ------------------------------------------------------------------------

	public function edit($id = 0)
	{
		$folder = $this->file_folders_model->find($id);
		if ( ! $folder)
		{
			Template::set_message(lang('file_folders.not_exists'), 'error');
			redirect(SITE_AREA . '/content/files');			
		}
		
		if ($submit = $this->input->post('submit'))
		{
			if ($this->save_folders('update', $id))
			{
				// log activity
				$this->load->model('activities/activity_model');
				$this->activity_model->log_activity($this->auth->user_id(), 
													lang('file_folders.edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 
													'files folders');
				
				// reinit folder tree
				$this->init_folder_tree();
				
				// set message
				Template::set_message(lang("file_folders.create_success"), 'success');
				
				if($submit== 'save_exit')
				{
					redirect(SITE_AREA . '/content/files');			
				}
			}
			else 
			{
				Template::set_message(lang("file_folders.create_error"), 'error');
			}
		}
		
		$this->data['folder'] 			= $folder;
		$this->data['file_folders'] 	= $this->_folders;
		$this->data['current_id'] 		= 0;		
		
		Assets::add_js(Template::theme_url('js/admin.js'),'external',true);
		Assets::add_js($this->load->view('folders/form_js', null, true), 'inline');
		
		Template::set('data',$this->data);
		Template::set("toolbar_title", "Manage Folder");
		Template::set_view('folders/form');
		Template::render();
	}

	// ------------------------------------------------------------------------

	public function delete($id = 0)
	{
		$ids = $id 
			? is_array($id)
				? $id
				: array($id)
			: (array) $this->input->post('action_to');

		// Do deletion
		if ($this->input->post('submit') == 'yes')
		{
			$total		= sizeof($ids);
			$deleted	= array();

			// Try do deletion
			foreach ($ids as $id)
			{
				// Get the row to use a value.. as title, name
				if ($folder = $this->file_folders_model->find($id))
				{					
					// not default folder
					if($id != '1')
					{
						// Make deletion retrieving an status and store an value to display in the messages
						$status = ($this->file_folders_model->delete($id) ? 'success': 'error');	
						$deleted[$status][] = $folder->name;
						
						if($status = 'success')
						{
							// log activity
							$this->load->model('activities/activity_model');
							$this->activity_model->log_activity($this->auth->user_id(), 
																lang('file_folders.delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 
																'files folders');
							
							// reinit folder tree
							$this->init_folder_tree();
						}
					}
					else
					{				
						$status = 'error';	
						$deleted[$status][] = $folder->name;
					}
				}
			}

			// Set status messages
			foreach ($deleted as $status => &$values)
			{
				// Mass deletion
				if (($status_total = sizeof($values)) > 1)
				{
					$last_value		= array_pop($values);
					$first_values	= implode(', ', $values);

					// Success / Error message
					$values = sprintf(lang('file_folders.delete_mass_' . $status), $status_total, $total, $first_values, $last_value);
				}				
				else // Single deletion
				{
					// Success / Error messages
					$values = sprintf(lang('file_folders.delete_' . $status), $values[0]);
				}
			}

			// He arrived here but it was not done nothing, certainly valid ids not were selected
			if ( ! $deleted)
			{
				$status		= 'error';
				$deleted	= array('error' => lang('file_folders.no_select_error'));
			}
			else
			{
				$status = array_key_exists('error', $deleted) ? 'error': 'success';
			}
			
			Template::set_message($deleted[$status], $status);
			
			redirect(SITE_AREA . '/content/files');			
		}		
		elseif($this->input->post('submit') == 'no')
		{	
			redirect(SITE_AREA . '/content/files');			
		}

		$data['file_folders'] 	= array();
		foreach ($ids as $id)
		{
			isset($this->_folders[$id]) && $data['file_folders'][$id] = $this->_folders[$id];
		}
		
		Template::set('data',$data);
		Template::set("toolbar_title", "Manage Folder");
		Template::set_view('folders/confirm');
		Template::render();
	}

	// ------------------------------------------------------------------------

	public function action()
	{
		switch($this->input->post('btnAction'))
		{
			case 'delete':
				$this->delete();
			break;
			default:
				$this->index();
			break;
		}
	}

	public function html_dropdown($id = 0)
	{
		$this->data['folder'] = $id && isset($this->_folders[$id]) ? $this->_folders[$id] : array();

		return $this->load->view('folders/html_dropdown', $this->data);
	}
	
	private function save_folders($type='insert', $id=0) 
	{	
		$this->form_validation->set_rules('name',lang('file_folders.name_label'),'required|trim|xss_clean|max_length[150]');			
		$this->form_validation->set_rules('slug',lang('file_folders.slug_label'),'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('parent_id',lang('file_folders.parent_label'),'required|trim|is_numeric|max_length[11]');	
		
		if ($this->form_validation->run() === false)
		{
			return false;
		}
		
		$data = array(
			'name'			=> $this->input->post('name'),
			'slug'			=> $this->input->post('slug'),
			'parent_id'		=> $this->input->post('parent_id')
		);		
		
		if ($type == 'insert')
		{
			$data['date_added'] = time();
			$id = $this->file_folders_model->insert($data);
			
			if (is_numeric($id))
			{
				$return = $id;
			}
			else
			{
				$return = false;
			}
		}
		else if ($type == 'update')
		{
			$return = $this->file_folders_model->update($id, $data);
		}
		
		return $return;
	}
	
}
