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
	public $name = 'Bs3';
	
/**
 * Path for CSS bootstrap 
 *
 * @var string
 */
	public $pathCSS = 'bootstrap/bootstrap.min';
	
/**
 * Path for JS bootstrap
 *
 * @var string
 */
	public $pathJS = 'bootstrap/bootstrap.min.js';
	
/**
 * Path for JQuery
 *
 * @var string
 */
	public $pathJquery = 'jquery.min.js';
	


/**
 * Initialize an HTML 4 document and the head
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
	
	public function body() {
		
		$out =  '</head>' . BL;
		$out .= '<body>' . BL;
		
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

	public function css($array_css = array()) {
		
		$out = parent::css($this->pathCSS). BL ;
		
		// Others CSS
		foreach($array_css as $css)
			$out .= parent::css($css) . BL;
			
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
	
	
	/*
	 * 
	 * --------------------
	 *      THE GRID
	 * --------------------
	 * 
	 */
	
	
	
/**
 * Create a <div class="col"> element.
 * 
 * Differents layouts with options.
 *
 * ### Construction
 *
 * $this->Bs3->col('xs.3.of1.ph9', 'md.3');
 *
 * It means : - For XS layout, a column size of 3, offset of 1 and push of 9.
 *			  - For MD layout, a column size of 3.
 *
 * You can give all parameters you want before $attributes. The rule of params is :
 *
 * 'LAYOUT . SIZE . OPTION-1 . OPTION-2'
 *
 * LAYOUT -> not obligatory for the first param ('xs' by default)
 * SIZE -> size of the column in a grid of 12 columns
 * OPTION-1 -> Not obligatory. Offset, push or pull. Called like this : 'of1', 'ph1' or 'pl1' where 1 is the size.
 * OPTION-2 -> The same that the previous option.
 *
 *
 * ### Attributes
 *
 * Same options that HtmlHelper::div();
 *
 * @param int $xs and more
 * @param array $attributes Options of the div element
 * @return string DIV tag element 
 */
	public function col($xs, $attributes = array()) {
		$class = '';
		$devices = array();

		$args = func_get_args();
		foreach ($args as $arg) {
			if (!is_array($arg)) {
				$devices[] = $arg;
			}else{
				$attributes = $arg;
			}
		}

		foreach ($devices as $d) {
			$elem = $d;
			$ecran = null;
			$taille = null;
			$opt = null;
			if ($d) {
				$replace = array('(', ')', '-', '_', '/', '\\', ';', ',', ':');
				$d = str_replace($replace, '.', $d);
				$d = explode('.', $d);
				if ($elem == $xs && is_numeric($d[0])) {
					$ecran = COL.'xs';
					$taille = $d[0];
					if (isset($d[1])){
						$opt = $this->optCol($d[1], $ecran, $taille);
						if (isset($d[2])) {
							$opt .= ' '.$this->optCol($d[2], $ecran, $taille);
						}
					}else{
						$opt = '';
					}
				}else{
					$ecran = COL.$d[0];
					$taille = $d[1];
					if (isset($d[2])){
						$opt = $this->optCol($d[2], $ecran, $taille);
						if (isset($d[3])) {
							$opt .= ' '.$this->optCol($d[3], $ecran, $taille);
						}
					}else{
						$opt = '';
					}
				}
				if ($opt != '') {
					$class .= ' '.$ecran.'-'.$taille.' '.$opt;
				}else{
					$class .= ' '.$ecran.'-'.$taille;
				}
			}	
		}

		$class = $this->_traitementClasse($class, $attributes);		
		$out = parent::div($class , null, $attributes). BL;
		return $out;
	}


/**
 * Fonction qui analyse le tableau d'option
 *
 * @param array $elem // classe appliquée sur l'élément col {PARAMETRE OBLIGATOIRE}
 * @param string $ecran // layout concerné {PARAMETRE OBLIGATOIRE}
 * @param int $num // taille {PARAMETRE OBLIGATOIRE}
 */

	private function optCol($elem, $ecran, $num){
		if (is_numeric($elem) && $ecran != COL.'xs') {
			return $ecran.'-offset-'.$elem;
		}else{
			$attr = substr($elem, 0, 2);
			$num = substr($elem, 2, count($elem));
			switch ($attr) {
				case 'pl':
					return $ecran.'-pull-'.$num;
					break;

				case 'ph':
					return $ecran.'-push-'.$num;
					break;
				
				default:
					if ($ecran != COL.'xs') {
						return $ecran.'-offset-'.$num;
					}else{
						return '';
					}
					break;
			}
		}
	}
	
}