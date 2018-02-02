<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use  App\Models\BlogPost;
use Sirius\Validation\Validator;
class PostController extends BaseController{
	public function getIndex(){
		//admin/post or admin/post/index

	/*	global $pdo;

		$query=$pdo->prepare('SELECT * FROM blog_post ORDER BY id DESC');

		$query->execute();*/

		//$blogPost=$query->fetchAll(\PDO::FETCH_ASSOC);
        $blogPost=BlogPost::all();//select*FROM blog_post
		return $this->render('admin/post.twig',['blogPost'=>$blogPost]);

	}/*paginaDondeSeListanLosPots*/

	public function getCreate(){
		// admin/post/create

		return $this->render('admin/insert-post.twig');
	}/*paginaParaCrearPostsFormulario*/

	public function postCreate(){
        $errors=[];
        $result=false;
	    $validator=new Validator();
        $validator->add('title','required');
	    $validator->add('content','required');

	    if($validator->validate($_POST)){
            $blogPost = new BlogPost([
                'title'=>$_POST['title'],
                'contenido'=>$_POST['contenido']
            ]);//INSERT INTO

            $blogPost->save();
            $result=true;
        }else{
	        $errors=$validator->getMessages();
	        //mensajeDeErrorEncasoDeValidacionErronea

        }



	return $this->render('admin/insert-post.twig',[
	    'result'=>$result,
        'errors'=>$errors
    ]);

	}/*paginaParaCrearPostsInsert*/

}

?>