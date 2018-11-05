<?php
namespace App\Controller;

class HelloController extends AppController {

  public function initialize () {
    $this->name = 'Hello';
    $this->viewBuilder()->setlayout('hello');
    $this->set('msg', 'Hello/index');
    $this->set('footer', 'Hello\footer2');
  }

  public function index () {
      $result = "";
      if ($this->request->isPost()) {
          $result = "<pre>※送信された情報<br />";
          foreach ($this->request->getData('HelloForm') as $key => $val){
              $result .= $key." => ".$val;
          }
          $result .= "</pre>";
      } else {
          $result = "※何か書いて送信してください。";
      }
      $this->set("result", $result);
  }

  public function other () {
    $this->viewBuilder()->enableAutoLayout(false);
    $this->autoRender = true;
  }

  public function sendForm () {
      $str = $this->request->getData('HelloForm.text1');
      $result = "";
      if ($str != "") {
          $result ="you typed: ".$str;
      } else {
          $result = "empty.";
      }
      $this->set("result", $result);
  }
}