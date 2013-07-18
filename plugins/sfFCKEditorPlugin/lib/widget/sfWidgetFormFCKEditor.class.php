<?php

/**
 * Represents a FCK Editor widget.
 *
 * @package    sfFCKEditorPlugin
 * @subpackage widget
 * @version    SVN: $Id$
 */
class sfWidgetFormFCKEditor extends sfWidgetForm
{

  /**
   * Constructor.
   *
   * Available options:
   *
   *  * config: Sets custom path to the FCKEditor configuration file
   *  * tool:   Sets the FCKEditor toolbar style
   *  * rows:   number of rows
   *  * width:  editor width
   *  * height: editor height
   *
   * @param array $options     An array of options
   * @param array $attributes  Attributes not supported. FCK editor rendering can be influenced by options.
   *
   * @see sfWidget
   * @see sfWidgetForm
   */
  public function __construct($options = array(), $attributes = array())
  {
    if (!empty($attributes)) {
      throw new Exception('Attributes not supported.');
    }
    
    $this->addOption('config', null);
    $this->addOption('rows', null);
    $this->addOption('width', null);
    $this->addOption('height', null);
    $this->addOption('tool', null);
    
    parent::__construct($options, $attributes);
  }
	
  /**
   * Render the widget
   * 
   * @param  string $name        The element name
   * @param  string $value       The value displayed in this widget
   * @param  array  $attributes  Attributes not supported. FCK editor rendering can be influenced by options.
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    if (!empty($attributes)) {
      throw new Exception('Attributes not supported.');
    }
    
    $editor = new sfRichTextEditorFCK();
    $options = $this->getOptions();

    $editor->initialize($name, $value, $options);
    
    return $editor->toHTML();
  }
  
}
