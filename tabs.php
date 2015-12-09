<?php

class TabsField extends InputField 
{
  static public $assets = array(
    'js' => array(
      'tabs.js'
    ),
    'css' => array(
      'tabs.css'
    )
  );

  public function input() {

    $input = new Brick('input', null);
    $input->addClass('tabfield');
    $input->attr(array(
      'id'           => $this->id(),
      'name'         => $this->name(),
      'required'     => $this->required(),
      'autofocus'    => $this->autofocus(),
      'autocomplete' => $this->autocomplete(),
      'readonly'     => $this->readonly(),
      'type'         => 'checkbox',
      'checked'      => v::accepted($this->value()),
    ));

    $wrapper = parent::input();
    $wrapper->tag('label');
    $wrapper->text($this->i18n($this->text()));
    $wrapper->attr('for', $this->id());
    $wrapper->removeAttr('id');
    $wrapper->addClass('tabfield');
    $wrapper->attr('data-field','tabfield');
    $wrapper->prepend($input);

    return $wrapper;

  }

  public function result() {

    $result = parent::result();
    return v::accepted($result) ? true : false;

  }

  public function validate() {
    return true;
  }

}