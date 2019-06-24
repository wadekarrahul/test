<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class PostsController extends Controller
{
	
	protected $request;
	protected $post;
	
	
	public function __construct(Request $request, Posts $post){
			$this->request = $request;
			$this->post = $post;
	}
	
    public function index(){
		$user_id = session('user_id');
		$posts = Posts::all();
		return view('posts.index', compact('posts', 'user_id'));
	}
	
	public function create(){
		return view('posts.create');
	}
	
	public function store(){
		$user_id = session('user_id');
		$this->post->store($this->request, $user_id);
		return redirect('posts/');
	}
	
	public function edit($id){
		$post = Posts::find($id);
		if($post && ($post->created_by == session('user_id') || session('is_admin') == '1')){
			return view('posts.edit', compact('post'));
		}else{
			abort(403);
		}
		
	}
	
	public function update($id){
		$this->post->updatePost($this->request, $id);
		return redirect('posts/');
	}
	
	public function view($id){
		$post = Posts::find($id);
		return view('posts.view', compact('post'));
	}
	
	public function delete($id){
		$post = Posts::find($id);
		if($post && ($post->created_by == session('user_id') || session('is_admin') == '1')){
			$this->post->deletePost($id);
			return redirect('posts/');
		}else{
			abort(403);
		}
	}
	
}
