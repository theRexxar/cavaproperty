<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class File_folders_model extends BF_Model {

	protected $table			= "file_folders";
	protected $key				= "id";
	protected $soft_deletes		= false;
	protected $date_format		= "datetime";
	protected $set_created		= false;
	protected $created_field 	= 'created_on';
	protected $set_modified 	= false;
	protected $modified_field 	= 'modified_on';

	private $_folders = array();
	
	/**
	 * Exists
	 *
	 * Checks if a given folder exists.
	 *
	 * @access	public
	 * @param	int		The folder id or slug
	 * @return	bool	If the folder exists
	 */
	public function exists($folder = 0)
	{
		if (is_numeric($folder))
		{
			$count = array('id' => $folder);
		}
		else
		{
			$count = array('slug' => $folder);
		}

		return (bool) (parent::count_by($count) > 0);
	}
	
	// ------------------------------------------------------------------------
	
	/**
	 * Has Children
	 *
	 * Checks if a given folder has children or not.
	 *
	 * @access	public
	 * @param	int		The folder id
	 * @return	bool	If the folder has children
	 */
	public function has_children($folder_id = 0)
	{
		return (bool) (parent::count_by(array('parent_id' => $folder_id)) > 0);
	}
	
	// ------------------------------------------------------------------------
	
	/**
	 * Folder Tree
	 *
	 * Get folder in an array
	 *
	 * @uses folder_subtree
	 */
	public function folder_tree($parent_id = 0, $depth = 0, &$arr = array())
	{
		$arr = $arr ? $arr : array();

		if ($parent_id === 0)
		{
			$arr	= array();
			$depth	= 0;
		}

		$folders = $this
			->order_by('name')
			->find_all_by(array('parent_id' => $parent_id));

		if ( ! $folders)
		{
			return $arr;
		}

		static $root = NULL;

		foreach ($folders as $folder)
		{
			if ($depth < 1)
			{
				$root = $folder->id;
			}

//			$folder->name_indent		= repeater('&raquo; ', $depth) . $folder->name;
			$folder->root_id			= $root;
			$folder->depth				= $depth;
			$folder->count_files		= sizeof($this->db->get_where('file', array('folder_id' => $folder->id))->result());
			$arr[$folder->id]			= $folder;
			$old_size					= sizeof($arr);

			$this->folder_tree($folder->id, $depth+1, $arr);

			$folder->count_subfolders	= sizeof($arr) - $old_size;
		}

		if ($parent_id === 0)
		{
			foreach ($arr as $id => &$folder)
			{
				$folder->virtual_path		= $this->_build_asc_segments($id, array(
					'segments'	=> $arr,
					'separator'	=> '/',
					'attribute'	=> 'slug'
				));
			}

			$this->_folders = $arr;
		}

		if ($parent_id > 0 && $depth < 1)
		{
			foreach ($arr as $id => &$folder)
			{
				$folder->virtual_path = $this->_folders[$id]->virtual_path;
			}
		}

		return $arr;
	}
	
	// ------------------------------------------------------------------------
	
	/**
	 * Get Folders
	 *
	 * Get the full array of folders
	 *
	 * @return 	array
	 */
	public function get_folders($id = 0)
	{
		if ($id)
		{
			$this->folder_tree($id);
		}
		elseif (empty($this->_folder))
		{
			$this->folder_tree();
		}
		
		return $this->_folders;
	}
	
	// ------------------------------------------------------------------------
	
	/**
	* Breadcrumb
	*
	* Generates a breadcrumb nav for folders
	*
	* @param	int $node The current folder id
	* @param	int $lev The current level
	* @return	array
	*/
	public function breadcrumb($id, $separator = '&raquo;', $limit = 3)
	{
		if ( ! $this->_folders)
		{
			$this->folder_tree();
		}

		return $this->_build_asc_segments($id, array(
			'segments'	=> $this->_folders,
			'attribute'	=> 'name',
			'separator'	=> ' ' . trim($separator) . ' ',
			'limit'		=> $limit
		));
	}

	public function _build_asc_segments($id, $options = array())
	{
		if ( ! isset($options['segments']))
		{
			return;
		}

		$defaults = array(
			'attribute'	=> 'name',
			'separator'	=> ' &raquo; ',
			'limit'		=> 0
		);

		$options = array_merge($defaults, $options);

		extract($options);

		$arr = array();

		while (isset($segments[$id]))
		{
			array_unshift($arr, $segments[$id]->{$attribute});
			$id = $segments[$id]->parent_id;
		}

		if (is_int($limit) && $limit > 0 && sizeof($arr) > $limit)
		{
			array_splice($arr, 1, -($limit-1), '&#8230;');
		}

		return implode($separator, $arr);
	}

	public function get_by_path($path)
	{
		if (is_array($path))
		{
			$path = implode('/', $path);
		}

		$path = trim($path, '/');

		if (empty($this->_folders))
		{
			$this->get_folders();
		}

		foreach ($this->_folders as $id => $folder)
		{
			if ($folder->virtual_path == $path)
			{
				return $folder;
			}
		}

		return array();
	}

	public function delete($id = 0)
	{
		$this->file_model->delete_files($id);
		
		$childrens = parent::find_all_by('parent_id', $id);
		if($childrens)
		{
			foreach($childrens as $children)
			{
				$this->delete($children->id);
			}
		}

		return parent::delete($id);
	}
}

/* End of file file_folders_model.php */