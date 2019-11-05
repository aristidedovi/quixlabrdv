<?php
namespace Core\HTML;

/*
 * class Form
 * Permet de générer un formulaire rapidement et simplement
 */
class Form{

    /**
     * @var array
     */
    private $data;

    /**
     * @var string
     */
    public $surround = 'p';

    /**
     * @var string
     */
    public $option = 'option';
    /**
     * Form constructor.
     * @param array $data
     */

    public function __construct($data = array()){
        $this->data = $data;
    }

    /**
     * @param $method
     * @param $action
     * @return string
     */
    public function formStart($method, $action){
        return '<form method="'.$method.'" action="'.$action.'" class="form-group">';
    }

    /**
     * @return string
     */
    public function formEnd(){
        return '</form>';
    }

    /**
     * @param $html
     * @return string
     */
    protected function surround($html){
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    /**
     * @param $index
     * @return mixed|null
     */

    protected function getValue($index){
        if(is_object($this->data)){
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    /**
     * @param $name
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = [],$hiddenLabel = null){
        $type = isset($options['type']) ? $options['type'] : 'text';

        return $this->surround(
            '<input type="'.$type.'" name="'.$name.'" value ="'.$this->getValue($name).'">'
        );

    }

    /**
     * @return string
     */

    public function submit(){
        return $this->surround('<button type="submit"> Envoyer </button>');
    }

}