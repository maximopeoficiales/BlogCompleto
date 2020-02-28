<?php

namespace App\Controllers;

use App\Models\UsersModel;/* inporta para usarlo */
use App\Models\PostModel;/* inporta para usarlo */
use App\Models\CategoriesModel;
use App\Models\PostsModel;
use App\Models\NewsletterModel;
use App\Models\CommentsModel;

class Dashboard extends BaseController
{
	public function index()
	{

		$this->loadViews('index');

	}

	public function uploadPost()
	{
		/* load models */
		$model = new CategoriesModel();
		$postmodel = new PostsModel();
		$data['categories'] = $model->findAll();

		/* validation */
		helper(["url", "form"]);/* obtengo las funcioens */
		$validation = \Config\Services::validation();/* servicio */
		$validation->setRules(
			[
				"title" => "required",
				"intro" => "required",
				"content" => "required|min_length[50]",
				"category" => "required",
			],
			[
				"title" => [
					"required" => "El titulo es requerido"
				],
				"intro" => [
					"required" => "El intro es requerido"
				],
				"content" => [
					"required" => "El content es requerido",
					"min_length" => "Minimo 50 caracteres"
				],
				"category" => [
					"required" => "La categoria es requerido"
				],
			]
		);
		if ($_POST) {
			if (!$validation->withRequest($this->request)->run()) {
				$errors = $validation->getErrors();
				$data['error'] = true;
			} else {
				/* form send */

				$file = $this->request->getFile("banner");/* obtiene el  */
				$filename = $file->getRandomName();/* nombre ramdom */
				if ($file->isValid()) {
					$file->move(ROOTPATH . "public/uploads", $filename);/* envia el file a una ubicacion */
				}

				$_POST['banner'] = $filename;
				$_POST['slug'] = url_title($_POST['title']);/* Separa en - */
				$_POST['created_at'] = date('Y-m-d');/* fecha */

				$postmodel->insert($_POST);
			}
		}
		$this->loadViews("uploadPost", $data);
	}

	public function add_newsletter()
	{
		if (isset($_POST['email'])) {
			$newlettermodel = new NewsletterModel();

			$_POST['added_at'] = date('Y-m-d');/* fecha */
			$emails = $newlettermodel->where('email', $_POST['email'])->findAll();

			/* 	print_r($emails); */
			if ($emails) {
				echo "Ya existe este email";/* data */
			} else {
				$id = $newlettermodel->insert($_POST);
				echo "Newsletter Guardado";/* data */
			}
		}
	}

	/* parametros por url */
	public function post($slug = null, $id = null)
	{
		if ($slug && $id) {
			$commentsmodel = new CommentsModel();
			$data['comments'] = $commentsmodel->where("id_post", $id)->findAll();
			$data['countcomments'] = count($data['comments']);/* alterna */

			/* validacion */
			if ($_POST) {
				helper(['url', 'form']);
				$validation = \Config\Services::validation();
				$validation->setRules(
					[
						"cName" => "required",
						"cEmail" => "required",
						"cMessage" => "required|min_length[20]",
					],
					[
						"cName" => ["required" => "El nombre es requerido"],
						"cEmail" => ["required" => "El email es requerido"],
						"cMessage" => [
							"required" => "El mensaje es requerido",
							"min_length" => "Minimo 20 caracteres por favor"
						]
					]
				);

				/* accion de la validacion */
				if (!$validation->withRequest($this->request)->run()) {
					echo "error";
				} else {
					echo "success";
					$fecha=date("Y-m-d");
					$arraycomment = [
						"name" => $_POST['cName'],
						"email" => $_POST['cEmail'],
						"comment" => $_POST['cMessage'],
						"created_at"=>$fecha,
						"id_post" => $id
					];
					$commentsmodel->insert($arraycomment);
				}
			}
			$postmodel = new PostsModel();
			$post = $postmodel->where("id_post", $id)->findAll();
			$data['post'] = $post;
			$categorymodel = new CategoriesModel();
			$data['categories'] = $categorymodel->where('id_cat', $post[0]['category'])->findAll();
			$this->loadViews("post", $data);
		}
	}


	public function category($id=null)
	{
		$postmodel= new PostsModel();
		$categorymodel= new CategoriesModel();
		$data['category']=$categorymodel->where("id_cat",$id)->findAll();
		$data['posts']=$postmodel->where("category",$id)->findAll();
/* 		print_r($data['category']);
		print_r($data['posts']); */


		$this->loadViews("category",$data);
	}
	/* Cargador de Vistas */
	public function loadViews($view = null, $data = null)
	{
		if ($data) {
			$data['view'] = $view;
			echo view('includes/header', $data);
			echo view($view, $data);
			echo view('includes/footer', $data);
		} else {
			echo view('includes/header');
			echo view($view);
			echo view('includes/footer');
		}
	}

	//--------------------------------------------------------------------

}
