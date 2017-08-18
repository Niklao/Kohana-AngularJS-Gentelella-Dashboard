<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dashboard extends Controller {

	public function action_index(){
		// if ($this->checkmaster()){
		if(true){
			$view=View::factory('backend/dashboard/ldashboard')->set('title','Dashboard|'.corporation_name);
			// $view->body=View::factory('dashboardv2/dtorso');
			// $view->body->name="Abhai Angle";
			// $view->body->dp="https://scontent.fbom5-1.fna.fbcdn.net/v/t1.0-0/p480x480/184500_10208328581510839_3006379802149075855_n.jpg?oh=d08d681b2ec35d460f17e14b325071af&oe=59B081D6";
			// $view->body->users=ORM::factory('User')->count_all();
			// //$view->body->products=ORM::factory('Product')->count_all();
			// $view->body->front_end=View::factory('dashboardv2/frontEnd');
			// $view->body->back_end=View::factory('dashboardv2/backEnd');
			// $view->body->uniqueVisitors=ORM::factory('Setting')->where('name', '=', 'uniqueVisitors' )->find()->value;
			// $view->body->cEditorModal=View::factory('dashboardv2/classified/modals/cEditorModal');
			$this->response->body($view);
		} else {
			$this->redirect('login', 302);
		}
		// $this->response->body(Viewloader::testRequest());
	}

	function checkmaster(){
		$user = Auth::instance()->get_user();
		if($user !== null){
			if(($user = ORM::factory('User')->where('id', '=', $user )->find()) !== null ){
				return $user;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function action_addAdminUsers(){
		$this->response->body('Yo Mama');
	}

	public function action_logout(){
		Auth::instance()->logout();
		$this->redirect('login', 302);
	}
}
