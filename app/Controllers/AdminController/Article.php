<?php
namespace App\Controllers\AdminController;

use App\Controllers\BaseController;
use App\Models\AdminModelArticle;
use App\Models\AdminModelComments;



class Article extends BaseController
{
    function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->m_admin_article = new AdminModelArticle();
        $this->m_admin_comment = new AdminModelComments();

        $this->PageController = "article";
    }
    function listComment($commentId)
    {
        $data = [];
        $comment = $this->m_admin_comment->getCommentFront($commentId);
        $DataPost = $this->m_admin_article->getPost($commentId);
        $data['comment'] =  $comment;
        $data['Post'] = $DataPost;   
        if($this->request->getVar('action')=='delete' && $this->request->getVar('DeleteId'))
        {
                $action = $this->m_admin_comment->deleteComment($this->request->getVar('DeleteId'));
                if($action ==  true)
                {
                    session()->setFlashdata('success', "Data Deleted");
                }
                else
                {
                    session()->setFlashdata('warning', "Failed To Delete Data");
                }
                return redirect()->to(base_url("admin/list-comments/".$DataPost['PostId']));
        }
        
        
        echo view('v_admin/v_a_list_comment', $data);
    }

    function listArticle()
    {
        $data = [];
        if($this->request->getVar('action')=='delete' && $this->request->getVar('PostId'))
        {
            $DataPost = $this->m_admin_article->getPost($this->request->getVar('PostId'));
            if($DataPost['PostId'])
            {
                @unlink(UploadDirectory."/".$DataPost['PostThumbnail']);
                $action = $this->m_admin_article->deletePost($this->request->getVar('PostId'));

                if($action == true)
                {
                    session()->setFlashdata('success', "Data Deleted");
                }
                else
                {
                    session()->setFlashdata('warning', "Failed To Delete Data");
                }
                return redirect()->to(base_url("admin/list-article"));
            }
        }

        $PostType = $this->PageController;
        $Keywords = "";

        $result = $this->m_admin_article->listPost($PostType, $Keywords);
        
        $data['record'] = $result; 
        
        
        echo view('v_admin/v_a_list_articles', $data);
    }

    

    function addArticle()
    {
        $data = [];
        if($this->request->getMethod()=='post')
        {
            $data = $this->request->getVar(); //return inputed data to views

        $rules = 
        [
            'PostTitle' =>[
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi.'],
            ],
            'PostContent' =>[
                'rules' => 'required',
                'errors' => ['required' => 'Konten harus diisi.'],
            ],
            'PostThumbnail' =>[
                'rules' => 'is_image[PostThumbnail]',
                'errors' =>['is_image' => 'Hanya gambar yang dapat di upload.'],
            ],

        ];

            $file = $this->request->getFile('PostThumbnail');

            if(!$this->validate($rules))
            {
                session()->setFlashdata('warning', $this->validation->getErrors());
            }
            else
            {
                $PostThumbnail = '';
                if($file->getName())
                {
                    $PostThumbnail = $file->getRandomName();
                }
                $record =
                [
                    'Username' => session()->get('AccountUsername'),
                    'PostTitle' => $this->request->getVar('PostTitle'),
                    'PostStatus' => $this->request->getVar('PostStatus'),
                    'PostThumbnail' => $PostThumbnail,
                    'PostDescription' => $this->request->getVar('PostDescription'),
                    'PostContent' => $this->request->getVar('PostContent')
                ];
                $PostType = $this->PageController;
                $action = $this->m_admin_article->insertPost($record, $PostType);
                if($action != false)
                {
                    $PageId = $action;
                    if($file->getName())
                    {
                        $UploadPathDir = UploadDirectory; //Retrive from constant.php
                        $file->move($UploadPathDir, $PostThumbnail);
                    }
                    session()->setFlashdata('success', 'Records Saved Successfully.');
                    return redirect()->to(base_url('admin/list-article/input-article'));
                }
                else
                {
                    session()->setFlashdata('warning', 'Failed To Save Records.');
                    return redirect()->to(base_url('admin/list-article/input-article')); 
                }

            }
        }

        
        echo view('v_admin/v_a_insert_article', $data);
    }

    

    function editArticle($PostId)
    {
        $data = [];
        $DataPost = $this->m_admin_article->getPost($PostId);
        if(empty($DataPost))
        {
            return redirect()->to(base_url('admin/list-article'));
        }
        $data = $DataPost;

        //Start Of Process Edit
        if($this->request->getMethod()=='post')
        {
            $data = $this->request->getVar(); //return inputed data to views

            $rules = 
            [
            'PostTitle' =>[
                'rules' => 'required',
                'errors' => ['required' => 'Judul harus diisi.'],
            ],
            'PostContent' =>[
                'rules' => 'required',
                'errors' => ['required' => 'Konten harus diisi.'],
            ],
            'PostThumbnail' =>[
                'rules' => 'is_image[PostThumbnail]',
                'errors' =>['is_image' => 'Hanya gambar yang dapat di upload.'],
            ],

            ];

            $file = $this->request->getFile('PostThumbnail');

            if(!$this->validate($rules))
            {
                session()->setFlashdata('warning', $this->validation->getErrors());
            }
            else
            {
                $PostThumbnail = $DataPost['PostThumbnail'];
                if($file->getName())
                {
                    $PostThumbnail = $file->getRandomName();
                }
                $record =
                [
                    'Username' => session()->get('AccountUsername'),
                    'PostTitle' => $this->request->getVar('PostTitle'),
                    'PostStatus' => $this->request->getVar('PostStatus'),
                    'PostThumbnail' => $PostThumbnail,
                    'PostDescription' => $this->request->getVar('PostDescription'),
                    'PostContent' => $this->request->getVar('PostContent'),
                    'PostId' => $PostId
                ];
                $PostType = $this->PageController;
                $action = $this->m_admin_article->insertPost($record, $PostType);
                if($action != false)
                {
                    $PageId = $action;
                    if($file->getName())
                    {
                        if($DataPost['PostThumbnail'])
                        {
                            @unlink(UploadDirectory."/".$DataPost['PostThumbnail']);
                        }
                        $UploadPathDir = UploadDirectory; //Retrive from constant.php
                        $file->move($UploadPathDir, $PostThumbnail);
                    }
                    session()->setFlashdata('success', 'Records Edited Successfully.');
                    return redirect()->to(base_url('admin/list-article/edit/'.$PostId));
                }
                else
                {
                    session()->setFlashdata('warning', 'Failed To Edit Records.');
                    return redirect()->to(base_url('admin/list-article/edit/'.$PostId)); 
                }

            }
            //End Of Process Edit
        }
        

        echo view('v_admin/v_a_edit_article', $data);
    }
}
