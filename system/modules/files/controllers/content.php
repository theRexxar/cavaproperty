<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Files Module
 *
 */

// ------------------------------------------------------------------------

/**
 * Backend Controller Class for the Content context
 *
 * This class is used to handle the backend functionality of the Files module.
 *
 */
class Content extends Admin_Controller 
{
	/**
	 * Variables
	 */
	private $data;
	private $_folders	= array();
	private $_path 		= '';
	private $_type 		= NULL;
	private $_ext 		= NULL;
	private $_filename	= NULL;
	private $_file		= NULL;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Files.Content.View');

		$this->config->load('files');
		$this->lang->load('files');
		$this->load->models(array('file_model','file_folders_model'));
		
		$this->init_folder_tree();
		
		$this->_path = FCPATH . $this->config->item('files_folder');
		$this->_check_dir();
		
		Assets::add_module_js('files', 'files.js');
		
		Assets::add_module_css('files', 'jquery.fileupload-ui.css');
		Assets::add_module_css('files', 'files.css');	
		
	}

	//--------------------------------------------------------------------
	
	/** 
	 * index
	 *
	 * List form data
	 */
	public function index()
	{
		$this->data['file_folders']	= $this->_folders;
		$this->data['current_id']	= 0;
		
		Template::set('data',$this->data);
		Template::set("toolbar_title", "Manage Files");
		Template::set_view('content/index');
		Template::render();
	}

	//--------------------------------------------------------------------
	
	/** 
	 * folder
	 *
	 * Show the folder contents
	 */
	public function folder($id = 0, $filter = '')
	{		
		if ($id)
		{
			$folder = $this->file_folders_model->find($id);
		}
		elseif ($path = $this->input->get('path'))
		{
			$folder = $this->file_folders_model->get_by_path($path);
			$filter = $this->input->get('filter');
		}
		
		if ( ! (isset($folder) && $folder))
		{
			Template::set_message(lang('file_folders.not_exists'), 'error');
			redirect(SITE_AREA.'/content/files');
		}
		elseif ( ! isset($folder->root_id))
		{
			$folder->root_id		= $this->_folders[$folder->id]->root_id;
			$folder->virtual_path	= $this->_folders[$folder->id]->virtual_path;
		}

		$this->load->library('table');

		// Make a breadcrumb trail
		$this->data['crumbs'] = $this->file_folders_model->breadcrumb($folder->id);

		// Get a list of all child folders
		$sub_folders = $this->file_folders_model->folder_tree($folder->root_id);

		// Array for select
		$this->data['sub_folders'] = array();
		foreach ($sub_folders as $sub_folder)
		{
			$this->data['sub_folders'][$sub_folder->virtual_path] = repeater('&raquo; ', $sub_folder->depth) . $sub_folder->name;
		}

		$root_folder = $this->_folders[$folder->root_id];

		// Set a default label
		$this->data['sub_folders'] = $this->data['sub_folders']
			? array($root_folder->virtual_path => lang('files.dropdown_root')) + $this->data['sub_folders']
			: array($root_folder->virtual_path => lang('files.dropdown_no_subfolders'));

		// Get the selected information.
		$this->data['folder']			= $folder;
		$this->data['selected_filter']	= $filter;

		// Avaliable type filters
		$this->data['types'] = array();

		$this->db->select('type as letter')->group_by('type');

		$types = $this->file_model->find_all_by('folder_id', $folder->id);
		
		if (! $types) $types = array();
		
		foreach ($types as $type)
		{
			$this->data['types'][$type->letter] = lang('files.type_' . $type->letter);
		}

		asort($this->data['types']);

		// Get all files
		in_array($filter, array('a', 'v', 'd', 'i', 'o')) && $this->db->where('type', $filter);

		$this->data['files'] = $this->file_model->order_by('date_added', 'DESC')->find_all_by('folder_id', $folder->id);

		$this->data['file_folders'] 	= $this->_folders;
		$this->data['current_id'] 		= $folder->root_id;
		
		Assets::add_js($this->load->view('content/folder_js', $this->data, true), 'inline');
		
		Template::set('data',$this->data);
		Template::set("toolbar_title", "Manage Files");
		Template::set_view('content/folder');
		Template::render();
	}

	//--------------------------------------------------------------------
	
	/** 
	 * upload
	 *
	 * Upload a file to the destination folder
	 */
	public function upload($folder_id, $ajax = false)
	{
		if ( ! $folder_id)
		{
			Template::set_message(lang('files.not_exists'), 'error');
			redirect(SITE_AREA . '/content/files');			
		}
		
		$this->data['file_folders']	= $this->_folders;
		$this->data['current_id']	= $folder_id;
		$this->data['folder'] 		= $this->_folders[$folder_id];
		
		if($this->input->post('submit') OR $ajax == 'ajax')
		{
			if ($id = $this->save_files())
			{
				$status		= 'success';
				$message	= sprintf(lang('files.create_success'), $this->_filename);
				$file		= array('name'	=> $this->_filename,
									'type'	=> $this->_file['file_type'],
									'size'	=> $this->_file['file_size'],
									'thumb'	=> base_url() . 'files/thumb/' . $id . '/80'
									);
				$return 	= array('status'=>$status,'message'=>$message,'file'=>$file); 

				// log activity
				$this->load->model('activities/activity_model');
				$this->activity_model->log_activity($this->auth->user_id(), 
													lang('files.upload_record').': ' . $id . ' : ' . $this->input->ip_address(), 
													'files');
			}
			else
			{				
				$status		= 'error';
				$message	= lang('files.create_error');
				$return 	= array('status'=>$status,'message'=>$message); 
			}
			
			if( $ajax )
			{
				$this->output->enable_profiler(false);
				echo json_encode(array($return));
				return TRUE;
			}
		}
				
		Assets::add_js(js_path().'jquery.ui.widget.js');
		Assets::add_js(js_path().'bootstrap-image-gallery.min.js');
		
		Assets::add_js(js_path().'image/tmpl.min.js');
		Assets::add_js(js_path().'image/load-image.min.js');
		Assets::add_js(js_path().'image/canvas-to-blob.min.js');
		
		Assets::add_js(js_path().'fileupload/jquery.fileupload.js');
		Assets::add_js(js_path().'fileupload/jquery.fileupload-ip.js');
		Assets::add_js(js_path().'fileupload/jquery.fileupload-ui.js');
		Assets::add_js(js_path().'fileupload/jquery.iframe-transport.js');
		
		Assets::add_js($this->load->view('content/upload_js', null, true), 'inline');
		
		Template::set('data',$this->data);
		Template::set("toolbar_title", "Manage Files");
		Template::set_view('content/upload');
		Template::render();
	}

	//--------------------------------------------------------------------
	
	/** 
	 * create
	 *
	 * Upload single file and meta data
	 */
	public function create($id = '')
	{	
		
		if($submit = $this->input->post('submit'))
		{
			if ($id = $this->save_files())
			{				
				// log activity
				$this->load->model('activities/activity_model');
				$this->activity_model->log_activity($this->auth->user_id(), 
													lang('files.upload_record').': ' . $id . ' : ' . $this->input->ip_address(), 
													'files');
													
				Template::set_message(sprintf(lang('files.create_success'), $this->_filename), 'success');				
				redirect(site_url(SITE_AREA.'/content/files/edit/'.$id));
			}
			else
			{				
				Template::set_message(lang('files.create_error'), 'error');
			}
		}
		
		Assets::add_js(js_path().'image/load-image.min.js');
		Assets::add_js($this->load->view('content/form_js', null, true), 'inline');

		Template::set('data',$this->data);
		Template::set("toolbar_title", "Manage Files");
		Template::set_view('content/form');
		Template::render();
	}

	//--------------------------------------------------------------------
	
	/** 
	 * edit
	 *
	 * Edit meta data for Uploaded file
	 */
	public function edit($id = '')
	{		
		if ( ! ($id && ($file = $this->file_model->find($id))))
		{
			Template::set_message(lang('files.file_label_not_found'), 'error');
			redirect(SITE_AREA . '/content/files');			
		}
		
		if($submit = $this->input->post('submit'))
		{
			if ($this->save_files('update', $id))
			{
				$file = $this->file_model->find($id);		
				
				// log activity
				$this->load->model('activities/activity_model');
				$this->activity_model->log_activity($this->auth->user_id(), 
													lang('files.edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 
													'files');
				Template::set_message(lang('files.edit_success'), 'success');
			}
			else
			{				
				Template::set_message(lang('files.edit_error'), 'error');
			}
		}
		
		$this->data['file'] = $file;
		
		Assets::add_js(js_path().'image/load-image.min.js');
		Assets::add_js($this->load->view('content/form_js', null, true), 'inline');

		Template::set('data',$this->data);
		Template::set("toolbar_title", "Manage Files");
		Template::set_view('content/form');
		Template::render();
	}

	// ------------------------------------------------------------------------

	/**
	 * delete
	 *
	 * Delete a file
	 */
	public function delete($id = 0)
	{
		$ids = $id
			? is_array($id)
				? $id
				: array($id)
			: (array) $this->input->post('action_to');

		$total		= sizeof($ids);
		$deleted	= array();

		// Try do deletion
		foreach ($ids as $id)
		{
			// Get the row to use a value.. as title, name
			if ($file = $this->file_model->find($id))
			{						
				// Make deletion retrieving an status and store an value to display in the messages
				$status = ($this->file_model->delete($id) ? 'success': 'error');			
				$deleted[$status][] = $file->filename;

				$folder	= $this->_folders[$file->folder_id];
					
				if($status = 'success')
				{
					// log activity
					$this->load->model('activities/activity_model');
					$this->activity_model->log_activity($this->auth->user_id(), 
														lang('files.delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 
														'files');
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
				$values = sprintf(lang('files.mass_delete_' . $status), $status_total, $total, $first_values, $last_value);
			}

			// Single deletion
			else
			{
				// Success / Error messages
				$values = sprintf(lang('files.delete_' . $status), $values[0]);
			}
		}

		// He arrived here but it was not done nothing, certainly valid ids not were selected
		if ( ! $deleted)
		{
			$status		= 'error';
			$deleted	= array('error' => lang('files.no_select_error'));
		}
		Template::set_message($deleted[$status], $status);
			
		if(isset($folder)) 
		{
			redirect(SITE_AREA . '/content/files/folder/'.$folder->id);
		}
		
		redirect(SITE_AREA . '/content/files');
	}

	/**
	 * action
	 *
	 * Helper method to determine what to do with selected items from form post
	 */
	public function action()
	{
		switch($this->input->post('btnAction'))
		{
			case 'delete':
				$this->delete();
			break;
			default:
				Template::redirect(SITE_AREA . '/content/files');
			break;
		}
	}

	//--------------------------------------------------------------------

	/*--------------------------------------------------------------------
	/	PRIVATE FUNCTIONS
	/-------------------------------------------------------------------*/

	//--------------------------------------------------------------------
	
	/** 
	 * init_folder_tree
	 *
	 * Init folders tree
	 * 
	 * @return void
	 */
	private function init_folder_tree()
	{
		$this->_folders = $this->file_folders_model->get_folders();		
		$this->data['folders_tree'] = array();

		// Array for select
		foreach ($this->_folders as $folder)
		{
			$this->data['folders_tree'][$folder->id] = repeater('&raquo; ', $folder->depth) . $folder->name;
		}
	}

	// ------------------------------------------------------------------------
	
	/** 
	 * init_folder_tree
	 *
	 * Validate our upload directory.
	 * 
	 * @return boolean 
	 */
	private function _check_dir()
	{
		if (is_dir($this->_path) && is_really_writable($this->_path))
		{
			return TRUE;
		}
		elseif ( ! is_dir($this->_path))
		{
			if ( ! @mkdir($this->_path, 0777, TRUE))
			{
				Template::set_message(lang('file_folders.mkdir_error'), 'error');
				return FALSE;
			}
			else
			{
				// create a catch all html file for safety
				$uph = fopen($this->_path . 'index.html', 'w');
				fclose($uph);
			}
		}
		else
		{
			if ( ! chmod($this->_path, 0777))
			{
				Template::set_message(lang('file_folders.chmod_error'), 'error');
				return FALSE;
			}
		}
	}
	
	// ------------------------------------------------------------------------
	
	/** 
	 * init_folder_tree
	 *
	 * Validate upload file name and extension and remove special characters.
	 * 
	 * @return boolean 
	 */
	function _check_ext($str, $id = 0, $type='insert')
	{
		if ( ! empty($_FILES['userfile']['name']))
		{
			$ext		= pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
			$allowed	= $this->config->item('files_allowed_file_ext');

			foreach ($allowed as $type => $ext_arr)
			{				
				if (in_array(strtolower($ext), $ext_arr))
				{
					$this->_type		= $type;
					$this->_ext			= implode('|', $ext_arr);
					$this->_filename	= trim(url_title($_FILES['userfile']['name'], 'dash', TRUE), '-');

					break;
				}
			}

			if ( ! $this->_ext)
			{
				$this->form_validation->set_message('_check_ext', lang('files.invalid_extension'));
				return FALSE;
			}

		}
		
		return TRUE;
	}

	//--------------------------------------------------------------------
	
	/** 
	 * save_files
	 *
	 * Handle save data
	 * 
	 * @return mixed
	 */	
	private function save_files($type='insert', $id=0) 
	{	
		
		if ($type == 'insert')
		{							
			$this->form_validation->set_rules('userfile',lang('file_folders.name_label'),'required|callback__check_ext['.$id.']');	
		}
		else
		{
			$this->form_validation->set_rules('userfile',lang('file_folders.name_label'),'callback__check_ext['.$id.']');		
		}
		$this->form_validation->set_rules('name',lang('file_folders.name_label'),'required|trim|xss_clean|max_length[250]');			
		$this->form_validation->set_rules('description',lang('file_folders.description_label'),'trim|xss_clean|max_length[250]');
		$this->form_validation->set_rules('folder_id',lang('file_folders.parent_label'),'required|trim|is_numeric|max_length[11]');	
		
		if ($this->form_validation->run() === false)
		{
			return false;
		}
			
			

		if ($this->_ext != NULL)
		{
			// Setup upload config
			$this->load->library('upload', array(
				'upload_path'	=> $this->_path,
				'allowed_types'	=> $this->_ext,
				'file_name'		=> time() . '_' . md5($this->_filename)
			));
			
			// File upload error
			if ( ! $this->upload->do_upload('userfile'))
			{
				Template::set_message($this->upload->display_errors(), 'error');
				return FALSE;
			}
			// File upload success
			else
			{					
				if(is_numeric($id) && $id > 0)
				{
					$this->file_model->delete_file($id);
				}
				$this->_file = $this->upload->data();
			}
		}
		
		$data = array();
		
		$data['folder_id']	= (int) $this->input->post('folder_id');
		$data['user_id']	= (int) $this->auth->user_id();
		$data['name']		= $this->input->post('name');
		$data['description']= $this->input->post('description') ? $this->input->post('description') : '';
		
		if($this->_file != NULL)
		{
			$data['type']		= $this->_type;
			$data['filename']	= $this->_file['file_name'];
			$data['extension']	= $this->_file['file_ext'];
			$data['mimetype']	= $this->_file['file_type'];
			$data['filesize']	= $this->_file['file_size'];
			$data['width']		= (int) $this->_file['image_width'];
			$data['height']		= (int) $this->_file['image_height'];
		}
		
		if ($type == 'insert')
		{							
			$data['date_added'] = time();
			$id = $this->file_model->insert($data);
			
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
			$return = $this->file_model->update($id, $data);
		}
		
		return $return;
	}
}