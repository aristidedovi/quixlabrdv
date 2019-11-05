<?php
namespace Core\HTML;

class BootstrapForm extends Form {

    /**
     * @param $html
     * @return string
     */
    protected function surround($html){
        return "<div class=\"form-group\">{$html}</div>";
    }

    /**
     * @param $name
     * @param $label
     * @param array $options
     * @param bool $hiddenLabel
     * @return string
     */

    public function input($name,$label, $options = [],$hiddenLabel = true){
        $type = isset($options['type']) ? $options['type'] : 'text';
        $l = $label;
        if($type === 'textarea'){
            $input = '<textarea rows="4" name="'.$name.'" class="form-control">'.$this->getValue($name).'</textarea>';
        }elseif($type === 'date'){
            $input = '<input type="text" name="'.$name.'" value="'.$this->getValue($name).'" placeholder="clicker pour selectionner la date et l\'heure" id="min-date" class="form-control" required>';
        }elseif($type === 'password'){
            $label = '';
            $input = '<input type="'.$type.'" id = "password" name="'.$name.'" value="'.$this->getValue($name).'" class="form-control" placeholder="Votre '.$l.'" data-toggle="password" required>';
        }else{
            if($hiddenLabel){
                $label = '';
                $input = '<input type="'.$type.'" name="'.$name.'" value="'.$this->getValue($name).'" class="form-control" placeholder="Votre '.$l.'" required>';
            }else{
                $label = '<label>'.$label.'</label>';
                $input = '<input type="'.$type.'" name="'.$name.'" value="'.$this->getValue($name).'" class="form-control" required>';
            }
        }
        return $this->surround($label.$input);
    }

    /*
     * else{
            $input = '<input type="'.$type.'" name="'.$name.'" value="'.$this->getValue($name).'" class="form-control">';
        }
      <input type="text" class="form-control" placeholder="set min date" id="min-date">
     */

    /**
     * @param $name
     * @param $label
     * @param $options
     * @param bool $service
     * @param bool $hidden
     * @return string
     */
    public function select($name, $label, $options,$service = false,$hidden = false){
        $label = '<label>'.$label.'</label>';
        if($hidden == true){
            $label = '';
            $input = '<select class="form-control" name="'.$name.'" id="'.$name.'" onchange="'.$name.'Fonction(e)" style="display: none" >';
        }else{
            $input = '<select class="form-control" name="'.$name.'" id="'.$name.'" onchange="'.$name.'Fonction(e)">';
        }
        if($service == true){
            unset($options[1]);
            unset($options[2]);
        }
        //var_dump($options);
            foreach ($options as $k => $v){
                $attributes = '';
                if($k == $this->getValue($name)){
                    $attributes = ' selected';
                }
                $input .= "<option value='$k'$attributes>$v</option>";
            }
        $input .= '</select>';

        return $this->surround($label.$input);
    }
    /**
     * @return string
     */
    public function submit(){
        return $this->surround(
            '<button type="submit" class="btn btn-primary">Envoyer</button>'
        );
    }

    public function dateInput(){

    }

}