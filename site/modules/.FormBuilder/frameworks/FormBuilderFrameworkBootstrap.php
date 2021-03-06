<?php namespace ProcessWire;

/**
 * FormBuilder Bootstrap framework definition file
 * 
 * @property int $horizontal
 * @property string $bootHorizHeaderClass
 * @property string $bootHorizContentClass
 * @property string $bootURL
 * @property string $inputSize
 * @property string $buttonType
 * @property string $buttonSize
 * @property string $buttonFull
 *
 */

class FormBuilderFrameworkBootstrap extends FormBuilderFramework {
	
	public function load() {
		
		$markup = array(
			'list' => "<div {attrs}>{out}</div>",
			'item' => "<div {attrs}>{out}</div>",
			'item_label' => "<label class='InputfieldHeader' for='{for}'>{out}</label>",
			'item_label_hidden' => "<label class='InputfieldHeader InputfieldHeaderHidden'><span>{out}</span></label>",
			'item_content' => "<div class='InputfieldContent {class}'>{out}</div>",
			'item_error' => "<p class='text-danger'>{out}</p>",
			'item_description' => "<p class='form-text text-muted'>{out}</p>",
			'item_notes' => "<p class='form-text text-muted'><small>{out}</small></p>",
			'success' => "<div class='alert alert-success'>{out}</div>",
			'error' => "<div class='alert alert-danger'>{out}</div>",
			'item_icon' => "",
			'item_toggle' => "",
			'InputfieldFieldset' => array(
				// 'item' => "<fieldset {attrs}>{out}</fieldset>",
				'item' => "<div {attrs}>{out}</div>",
				// 'item_label' => "<legend>{out}</legend>",
				'item_label' => "<h5 class='card-header'>{out}</h5>",
				//'item_label_hidden' => "<legend>{out}</legend>",
				'item_label_hidden' => "<h5 class='card-header'>{out}</h5>",
				//'item_content' => "<div class='InputfieldContent'>{out}</div>",
				'item_content' => "<div class='card-body'>{out}</div>",
				'item_description' => "<p class='form-text text-muted'>{out}</p>",
			)
		);

		$classes = array(
			'form' => 'InputfieldFormNoHeights',
			'list' => 'Inputfields',
			'list_clearfix' => 'clearfix',
			'item' => 'form-group Inputfield Inputfield_{name} {class}',
			'item_required' => 'InputfieldStateRequired',
			'item_error' => 'InputfieldStateError has-error',
			'item_collapsed' => 'InputfieldStateCollapsed',
			'item_column_width' => 'InputfieldColumnWidth',
			'item_column_width_first' => 'InputfieldColumnWidthFirst',
			'InputfieldCheckboxes' => array('item_content' => 'checkbox'),
			'InputfieldCheckbox' => array('item_content' => 'checkbox'),
			'InputfieldRadios' => array('item_content' => 'radio'),
			'InputfieldFieldset' => array(
				'item' => 'card fieldset mb-4 Inputfield InputfieldFieldset'
			)
		);

		//$markup['InputfieldFormBuilderForm'] = $markup['InputfieldFieldset'];
		//$classes['InputfieldFormBuilderForm'] = $classes['InputfieldFieldset'];

		/*
		if((int) $this->horizontal) {
			// for form-horizontal
			$headerClass = $this->wire('sanitizer')->entities($this->bootHorizHeaderClass);
			$contentClass = $this->wire('sanitizer')->entities($this->bootHorizContentClass);
			$classes['form'] .= " form-horizontal InputfieldFormNoWidths";
			$markup['item_label'] = "<label class='InputfieldHeader $headerClass control-label' for='{for}'>{out}</label>";
			$markup['item_label_hidden'] = "<label class='InputfieldHeader $headerClass InputfieldHeaderHidden'><span>{out}</span></label>";
			$markup['item_content'] = "<div class='InputfieldContent $contentClass {class}'>{out}{error}{description}{notes}</div>";
			$markup['InputfieldSubmit'] = array(
				'item_content' => "<div class='$headerClass'></div><div class='InputfieldContent $contentClass {class}'>{out}</div>",
			);
		}
		*/

		InputfieldWrapper::setMarkup($markup);
		InputfieldWrapper::setClasses($classes);

		$config = $this->wire('config');
		$frURL = $this->bootURL;
		if(strpos($frURL, '//') !== false) {
			$frURL = rtrim($frURL, '/');
		} else {
			$frURL = $this->wire('config')->urls->root . trim($frURL, '/');
		}
		
		if($this->allowLoad('framework')) {
			$config->styles->prepend("$frURL/css/bootstrap.min.css");
			$config->scripts->append("$frURL/js/bootstrap.min.js");
		}
		$config->styles->append($config->urls->FormBuilder . 'FormBuilder.css');
		$config->styles->append($config->urls->FormBuilder . 'frameworks/FormBuilderFrameworkBootstrap.css');
		$config->inputfieldColumnWidthSpacing = 0;

		// load custom theme stylesheets, where found
		if(!$this->form->theme) $this->form->theme = 'delta';

		$this->addHookBefore('InputfieldSubmit::render', $this, 'hookInputfieldSubmitRender'); 
		$this->addHookBefore('FormBuilderProcessor::renderReady', $this, 'hookRenderReady'); 
	}
	
	public function hookRenderReady($event) {
		/** @var HookEvent $event */
		$inputfields = $event->arguments(0); 
		$inputSize = $this->inputSize; 
		foreach($inputfields->getAll() as $in) {
			$ifc = $in->getSetting('inputfieldClass'); 
			if($in instanceof InputfieldCheckbox || $in instanceof InputfieldCheckboxes || $in instanceof InputfieldRadios || $ifc === 'InputfieldRadios') {
				// do not add form-control class
			} else if($in instanceof InputfieldPage) {
				if(strpos($in->get('inputfield'), 'InputfieldSelect') !== false) {
					// do not add form-control class
					$in->addClass("custom-select");
					if($inputSize) $in->addClass(str_replace('form-control-', 'custom-select-', $inputSize));
				}
			} else if($in->className() === 'InputfieldFormBuilderFile') {
				// 
			} else if($in->className() == 'InputfieldSelect') {
				$in->addClass("custom-select");
				if($inputSize) $in->addClass(str_replace('form-control-', 'custom-select-', $inputSize));
			} else {
				$in->addClass("form-control");
				if($inputSize) $in->addClass($inputSize);
			}
		}
	}
	
	public function hookInputfieldSubmitRender($event) {
		$in = $event->object;
		$event->replace = true;
		$classes = array('btn'); 
		if($this->buttonType) {
			$classes[] = 'btn-' . $this->buttonType;
		} else {
			$classes[] = 'btn-primary';
		}
		if($this->buttonSize) $classes[] = "btn-$this->buttonSize";
		if($this->buttonFull) $classes[] = "btn-block";
		$class = implode(' ', $classes); 
		$event->return = "<button type='submit' name='$in->name' value='$in->value' class='$class'>$in->value</button>";
	}

	/**
	 * Return Inputfields for configuration of framework
	 *
	 * @return InputfieldWrapper
	 *
	 */
	public function getConfigInputfields() {
		
		$inputfields = parent::getConfigInputfields();
		$defaults = $this->getConfigDefaults();
		$defaultLabel = $this->_('Default value:') . ' ';
		
		$f = $this->wire('modules')->get('InputfieldURL'); 
		$f->attr('name', 'bootURL'); 
		$f->label = $this->_('URL to Bootstrap framework'); 
		$f->description = $this->_('Specify a URL/path relative to root of ProcessWire installation.'); 
		$f->attr('value', $this->bootURL); 
		if($this->bootURL != $defaults['bootURL']) $f->notes = $defaultLabel . $defaults['bootURL']; 
		$inputfields->add($f);

		/*
		$f = $this->wire('modules')->get('InputfieldRadios');
		$f->attr('name', 'horizontal');
		$f->label = $this->_('Form style');
		$f->addOption(0, $this->_('Stacked (default)'));
		$f->addOption(1, $this->_('Horizontal (2-column)'));
		$f->attr('value', $this->horizontal);
		$f->description= $this->_('Please note that individual field column widths (if used) are not applicable when using the *Horizontal* style.'); 
		$inputfields->add($f);
		
		$f = $this->wire('modules')->get('InputfieldText');
		$f->attr('name', 'bootHorizHeaderClass');
		$f->label = $this->_('Horizontal label column (1)');
		$f->description = $this->_('Specify Bootstrap framework classes to apply to the label column.');
		$f->attr('value', $this->bootHorizHeaderClass);
		$f->columnWidth = 50;
		$f->showIf = 'frBootstrap_horizontal=1';
		if($this->bootHorizHeaderClass != $defaults['bootHorizHeaderClass']) $f->notes = $defaultLabel . $defaults['bootHorizHeaderClass'];
		$inputfields->add($f);

		$f = $this->wire('modules')->get('InputfieldText');
		$f->attr('name', 'bootHorizContentClass');
		$f->label = $this->_('Horizontal input column (2)');
		$f->description = $this->_('Specify Bootstrap framework classes to apply to the input column.');
		$f->attr('value', $this->bootHorizContentClass);
		$f->columnWidth = 50;
		$f->showIf = 'frBootstrap_horizontal=1';
		if($this->bootHorizContentClass != $defaults['bootHorizContentClass']) $f->notes = $defaultLabel . $defaults['bootHorizContentClass'];
		$inputfields->add($f);
		*/

		$f = $this->wire('modules')->get('InputfieldRadios');
		$f->attr('name', 'inputSize');
		$f->label = $this->_('Input size');
		$f->addOption('form-control-sm', $this->_('Small'));
		$f->addOption('', $this->_x('Normal', 'sizeType'));
		$f->addOption('form-control-lg', $this->_('Large'));
		$f->attr('value', $this->inputSize);
		$f->columnWidth = 34;
		$inputfields->add($f);

		$f = $this->wire('modules')->get('InputfieldRadios'); 
		$f->attr('name', 'buttonType'); 
		$f->label = $this->_('Submit button type'); 
		$f->addOption('', $this->_x('Default', 'buttonType'));
		$f->addOption('primary', 'Primary');
		$f->addOption('secondary', 'Secondary');
		$f->addOption('success', $this->_('Success'));
		$f->addOption('danger', $this->_('Danger'));
		$f->addOption('warning', $this->_('Warning'));
		$f->addOption('info', $this->_('Info'));
		$f->addOption('light', $this->_('Light'));
		$f->addOption('dark', $this->_('Dark'));
		$f->addOption('link', $this->_('Link'));
		$f->attr('value', $this->buttonType); 
		$f->columnWidth = 33; 
		$inputfields->add($f); 

		$f = $this->wire('modules')->get('InputfieldRadios');
		$f->attr('name', 'buttonSize');
		$f->label = $this->_('Submit button size'); 
		$f->addOption('sm', $this->_('Small'));
		$f->addOption('', $this->_('Medium (default)')); 
		$f->addOption('lg', $this->_('Large'));
		$f->attr('value', $this->buttonSize);
		$f->columnWidth = 33; 
		$inputfields->add($f);

		$f = $this->wire('modules')->get('InputfieldCheckbox'); 
		$f->attr('name', 'buttonFull'); 
		$f->label = $this->_('Full width button?'); 
		if($this->buttonFull) $f->attr('checked', 'checked');
		$f->columnWidth = 34; 
		$inputfields->add($f); 
		
		return $inputfields;
	}
	
	public function getConfigDefaults() {
		$urls = $this->wire('config')->urls; 
		$bootURL = str_replace($urls->root, '/', $urls->FormBuilder . 'frameworks/bootstrap/');
		return array_merge(parent::getConfigDefaults(), array(
			'horizontal' => 0,
			'bootURL' => $bootURL, 
			'bootHorizHeaderClass' => 'col-xs-5 col-sm-4 col-md-3',
			'bootHorizContentClass' => 'col-xs-7 col-sm-8 col-md-9',
			'inputSize' => '',
			'buttonType' => '',
			'buttonSize' => '',
			'buttonFull' => 0, 
		));
	}

	public function getFrameworkURL() {
		return $this->bootURL;
	}

	/**
	 * Get the framework version
	 *
	 * @return string
	 *
	 */
	static public function getFrameworkVersion() {
		return '4.3.1';
	}

}
