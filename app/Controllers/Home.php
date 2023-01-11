<?php

namespace App\Controllers;
use App\Models\AdminModelArticle;
use App\Models\AdminModelComments;

class Home extends BaseController
{

    function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->m_admin_article = new AdminModelArticle();
        $this->m_admin_comments = new AdminModelComments();

        helper("global_function_helper");
    }


    function index()
    {
        $data = []; 
        $PostType = 'article';
        $TotalData = 10;
        $Keywords = "";
        $group_dataset = "dt";

        $result = $this->m_admin_article->listPostFront($PostType, $TotalData, $Keywords, $group_dataset);
        $data['record'] = $result['record'];
        $data['pager'] = $result['pager'];

        $currentPage = $this->request->getVar('page_dt');
        $data['number'] = number($currentPage, $TotalData);

        echo view('v_user/v_u_index', $data);
    }

    function about()
    {
        echo view('v_user/v_u_about');
    }

    function contact()
    {
        echo view('v_user/v_u_contact');
    }

    function postDetail($PostId)
    {
        $data = []; 
        $TotalData = 5;
        $Keywords = "";
        $group_dataset= "dt";

        $resultPost = $this->m_admin_article->getPost($PostId);
        $CommentPostId = $resultPost['PostId'];
        $result = $this->m_admin_comments->listCommentFront($CommentPostId, $Keywords, $TotalData, $group_dataset);
        $data['record'] = $result['record']; 
        $data['pager'] = $result['pager']; 
        $data['PostContent'] = $resultPost;

       
        echo view('v_user/v_u_post_content', $data);
        
    }

    function addComment()
    {
            $id = $this->request->getPost('CommentPostId');
            if($this->request->getPost('save'))
            {
  
            $record['CommentName'] = $this->request->getPost('CommentName');
            $record['CommentEmail'] = $this->request->getPost('CommentEmail');
            $record['CommentContent'] = $this->request->getPost('CommentContent');
            $record['CommentPostId'] = $id;

            $response = $this->m_admin_comments->insertComment($record);

            if($response == true)
            {
                return redirect()->to("index/post-detail/$id#commentSection");
            }
            else
            {
                echo "<script>alert('Insert Comment Error !');</script>";
            }
            
            }
    }

}
