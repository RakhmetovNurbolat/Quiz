<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return 'index';
    }

    public function create(){
        return 'create';
    }

    public function store(){
        return 'store';
    }

    public function show( $post ){
        return 'show '.$post;
    }

    public function edit( $post){
        return 'edit'.$post;
    }
    public function update( $post ){
        return 'update'.$post;
    }
    public function delete($post){
        return 'delete'.$post;
    }
}
