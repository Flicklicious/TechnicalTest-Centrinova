<?php
namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class AdminModelArticle extends Model
{
    protected $table = "posts";
	protected $primaryKey = "PostId";
	protected $allowedFields = 
	[
		'Username',
        'PostTitle',
        'PostTitleSEO',
        'PostStatus', 
        'PostType', 
        'PostThumbnail',
        'PostDescription',
        'PostContent'
	];

    function setTitleSEO($title)
    {
        $builder = $this->table($this->table);
        $url = strip_tags($title); //Remove HTML tags in title
        $url = preg_replace('/[^A-Za-z0-9]/', " " , $url);
        $url = trim($url);
        $url = preg_replace('/[^A-Za-z0-9]/', "-" , $url);
        $url = strtolower($url);
        
        $builder->where('PostTitle', $title);
        $countData = $builder->countAllResults();
        if($countData > 0)
        {
            $countData = $countData +1;
            return $url."-".$countData;
        }
        return $url;
    }

    function insertPost($data, $PostType)
    {
        $builder = $this->table($this->table);
        $data['PostType'] = $PostType;

        if(isset($data['PostId']))
        {
            $action = $builder->save($data);
            $id = $data['PostId'];
        }
        else
        {
            $data['PostTitleSEO'] = $this->SetTitleSEO($data['PostTitle']);
            $action = $builder->save($data);
            $id = $builder->getInsertID();
        }

        if($action)
        {
            return $id;
        }
        else
        {
            return false;
        }
    }

    function listPost($PostType, $Keywords = null)
    {
        $builder = $this->table($this->table);
        $arrKeywords = explode(" ", $Keywords);
        $builder->groupStart();
        for($i=0; $i<count($arrKeywords);$i++)
        {
            $builder->orLike('PostTitle', $arrKeywords[$i]);
            $builder->orLike('PostDescription', $arrKeywords[$i]);
            $builder->orLike('PostContent', $arrKeywords[$i]);
        }
        $builder->groupEnd();
        
        $builder->where('PostType', $PostType);
        $builder->orderBy('PostTime', 'desc');
        
        $data = $builder->get();

        return $data->getResult();
    }

    function listPostFront($PostType, $TotalPage, $Keywords = null, $group_dataset = null)
    {
        $builder = $this->table($this->table);
        $arrKeywords = explode(" ", $Keywords);
        $builder->groupStart();
        for($i=0; $i<count($arrKeywords);$i++)
        {
            $builder->orLike('PostTitle', $arrKeywords[$i]);
            $builder->orLike('PostDescription', $arrKeywords[$i]);
            $builder->orLike('PostContent', $arrKeywords[$i]);
        }
        $builder->groupEnd();
        
        $builder->where('PostType', $PostType);
        $builder->orderBy('PostTime', 'desc');
        
        $data['record'] = $builder->paginate($TotalPage, $group_dataset);
        $data['pager'] = $builder->pager;
        return $data;
    }

    function getPost($PostId)
    {
        $builder = $this->table($this->table);
        $builder->where('PostId', $PostId);
        $query = $builder->get();
        return $query->getRowArray();
    }

    function getPostCount()
    {
        $builder = $this->table($this->table);
        return $builder->countAllResults();
    }
 
    function deletePost($PostId)
    {
        $builder = $this->table($this->table);
        $builder->where('PostId',$PostId);
        if($builder->delete())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

?>