<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function getIndex()
	{
		return View::make('check-home');		
	}

	public function anyList()
	{

		$backlinks=Backlink::all();
			return View::make('check-list',compact('backlinks'));
		}


	public function anyCheck()
	{
			if(!$backlink=Backlink::find(Input::get('bkid'))){
				$response['status']=false;
				}else{
					$response['status']=true;
					
				$backlink->check_count=$backlink->check_count+1;
				$backlink->save();

			$url = $backlink->check_url;
			$source = file_get_contents($url);
			if(!$source) {
				$response['status']=false;
				throw new Exception('Failed to connection.');
			}else{
				$response['status']=true;
			}

			/*SEARCH LINK ONE*/
			if ($backlink->link_one) {
				if (stristr($source, $backlink->link_one)){
					$response['link1']='on';
					}else{
						$response['link1']='off';
					}
			} else {
				$response['link1']='off';
			}
			
			/*SEARCH LINK TWO*/
			if ($backlink->link_two) {
				if (stristr($source, $backlink->link_two)){
					$response['link2']='on';
					}else{
						$response['link2']='off';
					}
			} else {
				$response['link2']='off';
			}

			/*SEARCH LINK Three*/
			if ($backlink->link_three) {
				if (stristr($source, $backlink->link_three)){
					$response['link3']='on';
					}else{
						$response['link3']='off';
					}
			} else {
				$response['link3']='off';
			}
		}//and if backlink
		return Response::json($response);

	}
}
