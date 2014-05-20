<?php
/**
 *
 * Helper CakePHP to create Twitter Bootstrap elements
 * @author AWL
 *
 */


class BsHelper extends HtmlHelper {


/**
 * The name of the helper
 *
 * @var string
 */
	public $name = 'Bs';




				/*--------------------------*
				*						    *
				*			CONFIG          *
				*					        *
				*--------------------------*/


/**
 * Path for CSS - Bootstrap and Font Awesome
 *
 * @var string
 */
	public $pathCSS = 'bootstrap';
	public $fa_path = '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css';
	public $bs_addon_path = 'bs_addon';

	// Load Font Awesome
	public $fa_load = true;
	public $bs_addon_load = true;

	// Prefix Font Awesome
	public $fa_prefix = 'fa-';

/**
 * Path for JS bootstrap
 *
 * @var string
 */
	public $pathJS = 'bootstrap.js';

/**
 * Path for JQuery
 *
 * @var string
 */
	public $pathJquery = 'http://codeorigin.jquery.com/jquery-1.10.2.min.js';




				/*--------------------------*
				*						    *
				*			LAYOUT          *
				*					        *
				*--------------------------*/



/**
 * Initialize an HTML document and the head
 *
 * @param string $titre The name of the current page
 * @param string $description The description of the current page
 * @param string $lang The language of the current page. By default 'fr' because we are french
 * @return string
 */

	public function html($titre = '' , $description = '' , $lang = 'fr') {

		$out = '<!DOCTYPE html>' . BL;
		$out .= '<html lang="'.$lang.'">' . BL;
		$out .= '<head>' . BL;
		$out .= '<meta charset="utf-8">' . BL;
		$out .= '<title>'.$titre.'</title>' . BL;
		$out .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . BL;
		$out .= '<meta name="description" content="'.$description.'">' . BL;

		return $out;
	}


/**
 * Initialize an HTML 5 document and the head
 *
 * @param string $titre The name of the current page
 * @param string $description The description of the current page
 * @param string $lang The language of the current page. By default 'fr' because we are french
 * @return string
 */

	public function html5($titre = '' , $description = '' , $lang = 'fr') {

		$out = $this->html($titre , $description , $lang);

		// Script JS for IE and HTML 5
		$out .= '<!--[if lt IE 9]>' . BL;
		$out .= '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>' . BL;
		$out .= '<![endif]-->' . BL;

		return $out;
	}


/**
 * Close the head element and initialize the body element
 *
 * @return string
 */

	public function body($classBody = '') {

		$out =  '</head>' . BL;

		if($classBody == '')
		$out .= '<body>' . BL;
		else
		$out .= '<body class="'.$classBody.'">' . BL;

		return $out;
	}


/**
 * Close the body element and the html element
 *
 * @return string
 */

	public function end() {

		$out =  '</body>' . BL;
		$out .= '</html>';

		return $out;
	}


/**
 * Load CSS for the current page
 *
 * @param array $array_css Names of CSS for the current page
 * @return string A link tag for the head element
 */

	public function css($path = array(), $options = array()) {

		$out = parent::css($this->pathCSS). BL ;
		if ($this->fa_load) {
			$out .= parent::css($this->fa_path) . BL;
		}
		if ($this->bs_addon_load) {
			$out .= parent::css($this->bs_addon_path) . BL;
		}

		// Others CSS
		foreach($path as $css)
			$out .= parent::css($css, $options) . BL;

		return $out;
	}


/**
 * Load JS for the current page
 *
 * @param array $array_js Names of JS for the current page
 * @return string A script tag for the head element
 */

	public function js($array_js = array()) {

		$out =  parent::script($this->pathJquery) . BL;
		$out .= parent::script($this->pathJS) . BL;

		// Others JS
		foreach($array_js as $js)
			$out .= parent::script($js). BL;

		return $out;
	}

/**
 * Close div elements
 *
 * @param int $nb Number of div you want to close
 * @return string End tags div
 */
	public function close($nb = 1) {
		$out = '';
		for($i=0;$i<$nb;$i++)
			$out .= '</div>' . BL;
		return $out;
	}


/**
 * Open a header element
 *
 * @param array $options Options of the header element
 * @return string Tag header
 */
	public function header($options = array()) {
		$out = parent::tag('header', null, $options). BL;
		return $out;
	}

/**
 * Close the header element
 *
 * @return string End tag header
 */
	public function closeHeader() {
		return '</header>' . BL;
	}




				/*--------------------------*
				*						    *
				*			GRID            *
				*					        *
				*--------------------------*/



/**
 * Open a Bootstrap container
 *
 * @param array $options Options of the div element
 * @return string Div element with the class 'container'
 */
	public function container($options = array()) {
		$out = '';
		$class = CONTAINER;
		if(isset($options['class']))
			$class .= SP . $options['class'];
		$out .= parent::div($class , null, $options). BL;
		return $out;
	}

/**
 * Open a Bootstrap row
 *
 * @param array $options Options of the div element
 * @return string Div element with the class 'row'
 */
	public function row($options = array()) {
		$out = '';
		$class = ROW;
		if(isset($options['class']))
			$class .= SP . $options['class'];
		$out .= parent::div($class , null, $options). BL;
		return $out;
	}


/**
 * Create a <div class="col"> element.
 *
 * Differents layouts with options.
 *
 * ### Construction
 *
 * $this->Bs->col('xs3 of1 ph9', 'md3');
 *
 * It means : - For XS layout, a column size of 3, offset of 1 and push of 9.
 *			  - For MD layout, a column size of 3.
 *
 * You can give all parameters you want before $attributes. The rule of params is :
 *
 * 'LAYOUT+SIZE OPTIONS+SIZE'
 *
 * LAYOUT -> not obligatory for the first param ('xs' by default).
 * SIZE -> size of the column in a grid of 12 columns.
 * OPTIONS -> Not obligatory. Offset, push or pull. Called like this : 'of', 'ph' or 'pl'.
 * SIZE -> size of the option.
 *
 *
 * ### Attributes
 *
 * Same options that HtmlHelper::div();
 *
 * @param string layout, size and options (offset, push and/or pull)
 * @param array $attributes Options of the div element
 * @return string DIV tag element
 */
	public function col() {
		$class = '';
		$devices = array();
		$attributes = array();

		$args = func_get_args();
		foreach ($args as $arg) {
			if (!is_array($arg)) {
				$devices[] = $arg;
			}else{
				$attributes = $arg;
			}
		}

		$arrayDevice = array('xs' , 'sm' , 'md' , 'lg');
		$arrayOptions = array('of' , 'ph' , 'pl');

		foreach ($devices as $device) {
			$ecran = null;
			$taille = null;
			$opt = null;
			$replace = array('(', ')', '-', '_', '/', '\\', ';', ',', ':', ' ');
			$device = str_replace($replace, '.', $device);
			$device = explode('.', $device);

			// Sould define the device in first
			foreach ($device as $elem) {
				if (!$ecran) {
					$nom = substr($elem, 0, 2);
					if(in_array($nom , $arrayDevice)) {
						$ecran = $nom;
						$taille = substr($elem, 2);
					}
				}else{
					if ($opt) {
						$opt .= ' '.$this->optCol($elem, $ecran);
					}
					else{
						$opt = $this->optCol($elem, $ecran);
					}
				}
			}
			if (isset($ecran) && $taille) {
				if ($opt) {
					$class .= 'col-'.$ecran.'-'.$taille.' '.$opt.' ';
				}else{
					$class .= 'col-'.$ecran.'-'.$taille.' ';
				}
			}
		}
		$class = substr($class,0,-1);
		if(isset($attributes['class']))
			$class .= SP . $attributes['class'];
		$out = parent::div($class , null, $attributes). BL;
		return $out;
	}


/**
 * Complementary function with BsHelper::col()
 *
 * Add the correct class for the option in parameter
 *
 * @param array $elem // class apply on the col element {PARAMETRE OBLIGATOIRE}
 * @param string $screen // layout {PARAMETRE OBLIGATOIRE}
 * @return string The class corresponding to the option
 */

	private function optCol($elem, $screen){
		$attr = substr($elem, 0, 2);
		$size = substr($elem, 2);
		if (is_integer($size) || !($size == 0 && $screen == 'sm'))  {
			switch ($attr) {
				case 'pl':
					return 'col-'.$screen.'-pull-'.$size;
					break;

				case 'ph':
					return 'col-'.$screen.'-push-'.$size;
					break;

				case 'of':
					return 'col-'.$screen.'-offset-'.$size;
					break;
				default:
					return null;
					break;
			}
		}
	}



				/*--------------------------*
				*						    *
				*			TABLES          *
				*					        *
				*--------------------------*/



/**
 * Number of column
 *
 * @var int
 */
	protected $_nbColumn = 0;

/**
 * Visibility of cells
 *
 * @var array
 */
    protected $_tableClassesCells = array();

/**
 * Position of the cell
 *
 * @var int
 */
    protected $_cellPos = 0;

/**
 * To know if a line is open or not
 *
 * @var boolean
 */
    protected $_openLine = 0;


	/**
	* Initialize the table with the head and the body element.
	* @param array $titles 'title' => title of the cell
	*					   'width' => width in percent of the cell
	*					   'hidden' => layout
	* @param array $class classes of the table (hover, striped, etc)
	* @return string
	*/
	function table($titles, $class = array()) {

		$classes = '';
		$out = '<div class="table-responsive">';

		if (!empty($class)) {
			foreach ($class as $opt) {
				$classes .= ' table-'.$opt;
			}
		}

		$out .= '<table class="table'.$classes.'">';

		if($titles != null) {

			$out .= '<thead>';
			$out .= TR;

			$tableClassesCells = array();
			$tablePos = 0;
			$nbColumn = count($titles);
			$width = false;

			foreach($titles as $title) {
				$classVisibility = '';
				if(isset($title['hidden'])) {
					foreach($title['hidden'] as $h) {
						$classVisibility .= ' hidden-'.$h;
					}
					$classVisibility .= ' hidden-xs';
				}
				$tableClassesCells[$tablePos] = $classVisibility;

				$out .= '<th class="';
				if (isset($title['width'])) {
					$out .= 'l_'.$title['width'];
					if (!$width) {
						$width = true;
					}
				}
				$out .= $classVisibility.'">'.$title['title'].'</th>';
				$tablePos ++;
			}

			$out .= _TR;
			$out .= '</thead>';
			$out .= '<tbody>';

			$this->_nbColumn = $nbColumn - 1;
			$this->_tableClassesCells = $tableClassesCells;
			$this->_cellPos = 0;
			$this->_openLine = 0;
		}
		return $out;
	}


	/**
	* Create a cell (<td>)
	* @param string $content Informations in the cell
	* @param string $class Classe(s) of the cell
	* @param bool $autoformat Close or not the cell when it is the last of the line
	* @return string
	*/
	public function cell($content, $class = '', $autoformat = true) {

		$out = '';
		$classVisibility = '';
		$cellPos = $this->_cellPos;

		if($cellPos == 0 && $this->_openLine == 0)
			$out .= TR;

		$this->_openLine = 0;

		if($this->_tableClassesCells[$cellPos])
			$classVisibility = $this->_tableClassesCells[$cellPos];

		if($classVisibility != '' || $class != '')
			$out .= '<td class="'.$class.$classVisibility.'">';
		else
			$out .= TD;

		$out .= $content;

		if($autoformat) {

			$out .= _TD;

			if($cellPos == $this->_nbColumn) {
				$out .= _TR;
				$this->_cellPos = 0;
			}
			else
				$this->_cellPos = $cellPos + 1;
		} else {
				if($cellPos == $this->_nbColumn)
					$this->_cellPos = 0;
				else
					$this->_cellPos = $cellPos + 1;
		}
		return $out;
	}


	/**
	* Color a line (<tr>)
	* @param string $color Colorof the line (active, warning, danger or success)
	* @return string
	*/
	public function lineColor($color) {
		$out = '<tr class="'.$color.'">';
		$this->_openLine = 1;
		return $out;
	}


	/**
	* Close the table
	* @return string
	*/
	public function endTable() {
		$out = '</tbody>';
		$out .= '</table>';
		$out .= '</div>';
		return $out;
	}




				/*--------------------------*
				*						    *
				*			OTHERS          *
				*					        *
				*--------------------------*/



/**
 * Picture responsive
 *
 * Extends from HtmlHelper:image()
 *
 * @param string $path Path to the image file, relative to the app/webroot/img/ directory.
 * @param array $options Array of HTML attributes. See above for special options.
 * @return string End tag header
 */
	public function image($path, $options = array()) {
		if(isset($options['class'])){
			$options['class'] = 'img-responsive '.$options['class'];
		}else{
			$options['class'] = 'img-responsive';
		}
		return parent::image($path, $options);
	}


/**
 * Create a Font Awesome Icon
 *
 * @param string $iconLabel label of the icon
 * @param array $options like 'fixed-width', 'large', '2x', etc.
 * @param array $attributes more attributes for the tag
 * @return string
 */
	public function icon($iconLabel, $classes = array(), $attributes = array()) {

		$class ='';
		$more = '';

		if (!empty($classes)) {
			foreach ($classes as $opt) {
				$class .= ' '.$this->fa_prefix.$opt;
			}
		}

		if (!empty($attributes)) {
			foreach ($attributes as $key => $attr) {
				$more .= ' '.$key.'="'.$attr.'"';
			}
		}

		return '<i class="fa '.$this->fa_prefix.$iconLabel.$class.'"'.$more.'></i>';

	}


/**
 * Create a Bootstrap Button or Link
 *
 * @param string $text text in the button
 * @param string $url url of the link
 * @param array $options 'size' => lg, sm or xs, to change the size of the button
 *						 'type' => primary, success, etc, to change the color
 *						 'tag' => to change the tag
 *						 and more... (like 'class')
 * @param array $confirmMessage to add a confirm pop-up
 * @return string
 */
	public function btn($text, $url = array(), $options = array(), $confirmMessage = false) {

		$tag = 'a';
		if (!empty($options['tag'])) {
			$tag = $options['tag'];
		}

		if (!isset($options['class'])) {
			$options['class'] = 'btn';
		}else{
			$options['class'] = 'btn '.$options['class'];
		}

		if (!empty($options['type'])) {
			$options['class'] .= ' btn-'.$options['type'];
		}
		if (!empty($options['size'])) {
			$options['class'] .= ' btn-'.$options['size'];
		}

		if ($tag != 'a') {
			unset($options['tag']);
			unset($options['type']);
			unset($options['size']);
		}

		if ($tag != 'a') {
			return parent::tag($tag, $text, $options);
		}else{
			return parent::link($text, $url, $options, $confirmMessage);
		}
	}

/**
* Create a Bootstrap Modal.
* @param string $header The text in the header
* @param string $body The content of the body
* @param array $buttons Informations about open, close and confirm buttons
* @param array $options Used to add custom ID, class or a form into the modal
* @return string Bootstrap modal
*/
	public function modal($header, $body, $options = array(), $buttons = array())
	{

		$classes = (isset($options['class'])) ? $options['class'] : '';
		// Is it a form ?
		$form = (isset($options['form']) && $options['form'] == true) ? true : false;
		// If it's a form then there is a submit button
		$type = ($form) ? 'submit' : 'button';

		// Generate a random id if it doesn't exist
		if (isset($options['id']) && $options['id'] != '') {
			$id = $options['id'];
		}else{
			$cle1 = "zarnfjdlvjezprizejrjpzojazjpodffp";
			$cle2 = "251848416487764197191944948794449";
			$cle = '';
			for ($i=0; $i < 15; $i++) {
				$tab = array($cle1, $cle2);
				if ($i == 0) {
					$cle .= $cle1[rand(0, strlen($cle1)-1)];
				}
				else{
					$t = $tab[rand(0,1)];
					$cle .= $t[rand(0, strlen($t)-1)];
				}
			}
			$id = $cle;
		}

	// Create the open button
		if (!empty($buttons)) {
			if (isset($buttons['open']) && $buttons['open'] != '') {
				if (is_array(($buttons['open']))){
					// Create a simple font-awesome icon instead of a button
					if (isset($buttons['open']['button']) && $buttons['open']['button'] === false) {
						$out = $this->icon($buttons['open']['name'], array('open-modal'), array('data-toggle' => 'modal', 'data-target' => '#'.$id));
					} else {
						$out = $this->btn(__($buttons['open']['name']), null , array('tag' => 'button', 'class' => $buttons['open']['class'], 'data-toggle' => 'modal', 'data-target' => '#'.$id));
					}
				}else{
					$out = $this->btn(__($buttons['open']), null , array('tag' => 'button', 'class' => 'btn-primary btn-lg', 'data-toggle' => 'modal', 'data-target' => '#'.$id));
				}
			}else{
				$out = $this->btn(__('Voir'), null , array('tag' => 'button', 'class' => 'btn-primary btn-lg', 'data-toggle' => 'modal', 'data-target' => '#'.$id));
			}
		}else{
			$out = $this->btn(__('Voir'), null , array('tag' => 'button', 'class' => 'btn-primary btn-lg', 'data-toggle' => 'modal', 'data-target' => '#'.$id));
		}

	// Modal
		$out .= '<div class="modal fade '.$classes.'" id="'.$id.'" tabindex="-1" role="dialog" aria-labelledby="'.$id.'Label" aria-hidden="true">'.BL;
		$out .= '<div class="modal-dialog">'.BL;

		// Content
			$out .= '<div class="modal-content">'.BL;

			if ($form) {
				$close = strpos($body, '>');
				$out .= substr($body, strpos($body, '<form'), $close+1).BL;
				$body = substr($body, $close+1, strpos($body, '</form>')-($close+1));
			}

			// Header
				$out .= '<div class="modal-header">'.BL;
				$out .= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'.BL;
				$out .= '<h4 class="modal-title" id="'.$id.'Label">'.$header.'</h4>'.BL;
				$out .= '</div>'.BL;
			// End header

			// Body
				$out .= '<div class="modal-body">'.BL;
				$out .= $body.BL;
				$out .= '</div>'.BL;
			// End body

			// Footer
				$out_footer = '';
				if (!empty($buttons)) {
					if (isset($buttons['close'])) {

						// If the value of 'close' is an array (like 'close' => array('name' => 'Close') )
						if (is_array(($buttons['close']))){
							$out_footer .= $this->btn(__($buttons['close']['name']), null , array('tag' => 'button', 'class' => $buttons['close']['class'], 'data-dismiss' => 'modal'));
						}else{
							$out_footer .= $this->btn(__($buttons['close']), null , array('tag' => 'button', 'class' => 'btn-link', 'data-dismiss' => 'modal'));
						}

					// If 'close' index exist => create the button
					}elseif(in_array('close', $buttons)){
						$out_footer .= $this->btn(__('Fermer'), null , array('tag' => 'button', 'class' => 'btn-link', 'data-dismiss' => 'modal'));
					}
					if (isset($buttons['confirm'])) {

						// Check if it's a form
						if ($form) {
							$class = (isset($buttons['confirm']['class'])) ? $buttons['confirm']['class'] : 'btn-success';
							$out_footer .= $this->btn(__($buttons['confirm']['name']), null , array('tag' => 'button', 'class' => $class, 'type' => $type));
						}else{
							$class = (isset($buttons['confirm']['class'])) ? $buttons['confirm']['class'] : 'btn-success';
							$out_footer .= $this->btn(__($buttons['confirm']['name']), $buttons['confirm']['link'] , array('class' => $class));
						}

					// If 'confirm' index exist => create the button
					}elseif(in_array('confirm', $buttons)){
						$out_footer .= $this->btn(__('Confirmer'), null , array('tag' => 'button', 'class' => 'btn-success', 'type' => $type));
					}

					if ($out_footer != '') {
						$out .= '<div class="modal-footer">'.BL;
						$out .= $out_footer.BL;
						$out .= '</div>'.BL;
					}
				}
				$out .=  ($form) ? '</form>'.BL : '';
			// End footer

			$out .= '</div>'.BL;
		// End Content

		$out .= '</div>'.BL;
		$out .= '</div>'.BL;

		return $out;
	}


/**
* Create a button with a confirm like a Bootstrap Modal
* @param string $button the name of the button, the header and the confirm button in the modal
* @param string $link the link to redirect after the confirm
* @param array $options
* @return string
*/
	public function confirm($button, $link, $options = array())
	{
		$buttons = array(
			'open' => array(
				'name' => $button
			),
			'close',
			'confirm' => array(
				'link' => $link
			)
		);

		$buttons['open']['class'] = $buttons['confirm']['class'] = (isset($options['color']) && $options['color'] != '') ? 'btn-'.$options['color'] : 'btn-success';
		$buttons['confirm']['name'] = (isset($options['button']) && $options['button'] != '') ? $options['button'] : $button;
		$body = (isset($options['texte'])  && $options['texte'] != '') ?  $options['texte'] : 'Voulez-vous vraiment continuer votre action ?';
		$header = (isset($options['header'])  && $options['header'] != '') ?  $options['header'] : $button;

		return $this->modal($header, $body, null, $buttons);
	}
}
