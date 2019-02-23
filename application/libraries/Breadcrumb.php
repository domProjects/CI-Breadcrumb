<?php
/**
 * @package   CodeIgniter
 * @author    Emmanuel CAMPAIT
 * @copyright Copyright (c) 2013 - 2019, domProjects (https://domprojects.com)
 * @license   http://opensource.org/licenses/MIT	MIT License
 * @link      https://domprojects.com
 * @since     Version 1.1.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * HTML Breadcrumb Generating Class
 *
 *
 * @package    CodeIgniter
 * @subpackage Libraries
 * @category   HTML Breadcrumb
 * @author     Emmanuel CAMPAIT
 * @link       https://domprojects.com
 */
class Breadcrumb
{
	protected $CI;

	private $breadcrumb = [];

	/**
	 * breadcrumb layout template
	 *
	 * @var array
	 */
	public $template = NULL;

	/**
	 * Newline setting
	 *
	 * @var string
	 */
	public $newline = "\n";

	/**
	 * Set the template from the breadcrumb config file if it exists
	 *
	 * @param	array	$config	(default: array())
	 * @return	void
	 */
	public function __construct($config = [])
	{
		//
		$this->CI =& get_instance();

		//
		$this->CI->load->helper('url');

		// initialize config
		foreach ($config as $key => $val)
		{
			$this->template[$key] = $val;
		}

		log_message('info', 'Breadcrumb Class Initialized');
	}

	// --------------------------------------------------------------------

	/**
	 * Set the template
	 *
	 * @param	array	$template
	 * @return	bool
	 */
	public function set_template($template)
	{
		if ( ! is_array($template))
		{
			return FALSE;
		}
		else
		{
			$this->template = $template;
			return TRUE;
		}
	}

	// --------------------------------------------------------------------

	public function add_item($args)
	{
		if ( ! is_array($args) OR empty($args))
		{
			return FALSE;
		}
		else
		{
			foreach ($args as $key => $value)
			{
				$href = site_url($value);

				$this->breadcrumb[$href] = [
					'page' => $key,
					'href' => $href
				];
			}
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Generate the breadcrumb
	 *
	 * @param	mixed	$breadcrumb_data
	 * @return	string
	 */
	public function generate()
	{
		if ($this->breadcrumb)
		{
			// Compile and validate the template date
			$this->_compile_template();

			// Build the breadcrumb
			$out = $this->template['tag_open'].$this->newline;

			foreach ($this->breadcrumb as $key => $value)
			{
				$keys = array_keys($this->breadcrumb);

				if (end($keys) == $key)
				{
					$out .= $this->template['crumb_active'].$value['page'].$this->template['crumb_close'].$this->newline;
				}
				else
				{
					$out .= $this->template['crumb_open'];
					$out .= anchor($value['href'], $value['page']);
					$out .= $this->template['crumb_close'];
					$out .= $this->newline;
				}
			}

			$out .= $this->template['tag_close'].$this->newline;

			// Clear Breadcrumb class properties before generating the breadcrumb
			$this->clear();

			return $out;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Clears the breadcrumb arrays. Useful if multiple tables are being generated
	 *
	 * @return	Breadcrumb
	 */
	public function clear()
	{
		$this->breadcrumb = [];
		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Compile Template
	 *
	 * @return	void
	 */
	protected function _compile_template()
	{
		if ($this->template === NULL)
		{
			$this->template = $this->_default_template();
			return;
		}

		$this->temp = $this->_default_template();

		foreach (array('tag_open', 'tag_close', 'crumb_open', 'crumb_close', 'crumb_active') as $val)
		{
			if ( ! isset($this->template[$val]))
			{
				$this->template[$val] = $this->temp[$val];
			}
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Default Template
	 *
	 * @return	array
	 */
	protected function _default_template()
	{
		return [
			'tag_open' => '<ol>',
			'tag_close' => '</ol>',
			'crumb_open' => '<li>',
			'crumb_close' => '</li>',
			'crumb_active' => '<li class="active">'
		];
	}
}
