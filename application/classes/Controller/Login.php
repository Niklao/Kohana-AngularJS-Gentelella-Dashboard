<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Controller {

	public $title="BuildAngle|Dashboard";

	public function action_index(){
		if ($this->request->post()){
			$post = $this->request->post();
			$success = Auth::instance()->login('superDuper','mexico123','true');
			if ($success){
				$this->redirect('dashboard', 302);
			} else {
				$view=View::factory('backend/login/llogin')->set('title' , 'wrong password');
				$view->error=true;
				$this->response->body($view);
			}
		} else {
			$view=View::factory('backend/login/llogin')->set('title' , $this->title);
			$view->error=false;
			$this->response->body($view);
		}
	}
}
