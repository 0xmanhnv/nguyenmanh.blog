<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;
use Session;
use Illuminate\Support\Facades\Input;

class LoginFacebookController extends Controller
{
	private $fb;
	private $params;

	public function __construct(LaravelFacebookSdk $fb)
	{
		$this->fb = $fb;
		$this->params = [
			'email', 
			'user_events',
			'user_managed_groups',
			'publish_actions',
			'user_status',
			'public_profile',
			'user_about_me',
			'user_friends',
			'publish_pages',
			'manage_pages'
		];
	}
	/**
	 * [login description]
	 * @return [type] [description]
	 */
    public function login(){
    	// Send an array of permissions to request
	    $login_url = $this->fb
	    			->getRedirectLoginHelper()
	    			->getLoginUrl('http://127.0.0.1:8000/facebook/callback',$this->prams);

	    return view('login', [
	    	'login_fb_url' =>$login_url,
	    ]);
    }

    /**
     * [callback description]
     * @return function [description]
     */
    public function callback(Request $request){
    	 $this->fb->getRedirectLoginHelper()->getPersistentDataHandler()->set('state', $request->state);
    	    // Obtain an access token.
	    try {
	        $token = $this->fb->getAccessTokenFromRedirect();

	    } catch (Facebook\Exceptions\FacebookSDKException $e) {
	        dd($e->getMessage());
	    }

	    $this->fb->setDefaultAccessToken($token);

	    // Save for later
	    Session::put('fb_user_access_token', (string) $token);

	    // Get basic info on the user from Facebook.
	    try {
	        $response = $this->fb->get('/me?fields=id,name,email');
	    } catch (\Facebook\Exceptions\FacebookSDKException $e) {
	        dd($e->getMessage());
	    }

	    // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
	    $facebook_user = $response->getGraphUser();
	    Session::put('fb_user', $facebook_user);

	    return redirect('/zentgroup')->with('message', 'Successfully logged in with Facebook');
    }


    public function groups(){
    	$fb_user = session()->get('fb_user');

    	try {
		  // Returns a `Facebook\FacebookResponse` object
		  $response = $this->fb->get(
		    '/'.$fb_user['id'].'/groups',
		    session()->get('fb_user_access_token')
		  );

		  // dd($response);
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}
		// $graphNode = $response->getGraphNode();
		$groups = $response->getDecodedBody();
		/* handle the result */

		return view('zentgroup.groups', [
			'groups' => $groups['data']
		]);
    }

    public function members($id){
    	try {
		  // Returns a `Facebook\FacebookResponse` object
		  $response = $this->fb->get(
		    '/'.$id.'/members',
		    session()->get('fb_user_access_token')
		  );
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}
		$members = $response->getDecodedBody();
		/* handle the result */

		return view('zentgroup.members', [
			'members' => $members['data']
		]);
		
    }

    public function postToGroup($id){
    	// dd(Input::get('messages'));
    	try {
		  // Returns a `Facebook\FacebookResponse` object
		  $response = $this->fb->post(
		    '/'.$id.'/feed',
		    array (
		      'message' => Input::get('messages'),
		    ),
		    session()->get('fb_user_access_token')
		  );
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}
		return redirect()->back();
    }
    /**
     * [index description]
     * @return [type] [description]
     */
    public function index(){
    	return view('zentgroup.index');
    }


    public function getIdFriend(){
    	$fb_user = session()->get('fb_user');
    	/* PHP SDK v5.0.0 */
		/* make the API call */
		try {
		  // Returns a `Facebook\FacebookResponse` object
		  $response = $this->fb->get(
		    '/'.$fb_user['id'].'/friends',
		    session()->get('fb_user_access_token')
		  );
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}
		$test = $response->getDecodedBody();

		dd($test);
		/* handle the result */
    }

    public function postToUser(){
    	$fb_user = session()->get('fb_user');
    	// dd(Input::get('messages'));
    	try {
		  // Returns a `Facebook\FacebookResponse` object
		  $response = $this->fb->post(
		    '/1889416918041725/feed',
		    array (
		      'message' => 'test',
		    ),
		    session()->get('fb_user_access_token')
		  );
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}
		return redirect()->back();
    }

    public function tagToPost(){
    	
    }
}
