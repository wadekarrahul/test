<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
	
	public function store($request, $user_id){
		$post = new Posts;
		$post->title = htmlspecialchars($request->get('title'));
		$post->body = htmlspecialchars($request->get('body'));
		$post->created_by = $user_id;
		$post->save();
	}
	
	public function updatePost($request, $id){
		$post = Posts::find($id);
		$post->title = htmlspecialchars($request->get('title'));
		$post->body = htmlspecialchars($request->get('body'));
		$post->save();
	}
	
	public function deletePost($id){
		$post = Posts::find($id);
		$post->delete();
	}
}
