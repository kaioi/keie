<?php

namespace App\Controllers;
use App\Models\BlogPost;

class IndexController extends BaseController{
	
	public function getIndex(){
        $blogPost = BlogPost::query()->orderBy('id','desc')->get();//ejecutaConsultaYregresaValor



	    /*global $pdo;
		$query=$pdo->prepare('SELECT * FROM blog_post ORDER BY id DESC');

		$query->execute();

		$blogPost=$query->fetchAll(\PDO::FETCH_ASSOC);*/
		return $this->render('index.twig',['blogPost'=>$blogPost]);	
	}

}
?>