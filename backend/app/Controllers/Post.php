<?php
namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\PostsModel;


class Post extends Controller
{
    // 생성
    public function getcreate()
	{
        return view("/post/create");
	}

    public function postcreate()
	{
		$model = new PostsModel();
        $post_id = $model->insert($this->request->getPost());
        if ($post_id) {
        $this->response->redirect("/post/show/$post_id");}
         else {
        return view("/post/create", [
            'post_data' => $this->request->getPost(),
            'errors' => $model->errors()
        ]);
        }
		
	}
    
    // 조회
    public function getshow($post_id){
		$model = new PostsModel();
		$post = $model->find($post_id);
		if (!$post) {
			return $this->response->redirect("/post");
		}
		return view('/post/show',[
			'post' => $post
		]);
    }   

    // 수정
    public function getedit($post_id)
	{
		$model = new PostsModel();
		$post = $model->find($post_id);
		if (!$post) {
			return $this->response->redirect("/post");
		}
        return view("/post/create",[
				'post_data' => $post
			]);
	}

    public function postedit($post_id)
	{
		$model = new PostsModel();
		$post = $model->find($post_id);
		$model->update($post_id, $this->request->getPost());
		$this->response->redirect("/post/show/$post_id");
	}

    // 삭제
    // public function getdelete($post_id)
	// {
	// 	if ($this->request->getMethod() !== "post"){
	// 		return $this->response->redirect("/post");
	// 	}
	// }

    public function postdelete($post_id)
	{
		$model = new PostsModel();
		$post = $model->find($post_id);
		if (!$post) {
			return $this->response->redirect("/post");
		}
		$model->delete($post_id);
        // $model->update($post_id, $this->request->getPost());
		return $this->response->redirect("/post");
	}

    // 목록
    public function getindex($page=1){
		$model = new PostsModel();
		$post_query = $model->orderBy("created_at", "desc");
		$post_list = $model->paginate(10);
		$pager = $post_query->pager;
		$pager->setPath("/post");
	
		return view("post/index", [
			'post_list' => $post_list,
			'pager' => $pager
		]);
    }

}