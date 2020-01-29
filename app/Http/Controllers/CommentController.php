<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function store()
  {
      $data = request()->validate([
          'user_id' => 'required',
          'post_id' => 'required',
          'comment' => 'required',
      ]);

      $comment = new \App\KomentarPost();

      $comment->user_id = $data['user_id'];
      $comment->post_id = $data['post_id'];
      $comment->comment = $data['comment'];
      $comment->save();

      return redirect('/home');
  }
}
