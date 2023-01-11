<?php
namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class AdminModelComments extends Model
{
    protected $table = "comments";
	protected $primaryKey = "CommentId";
	protected $allowedFields = 
	[
        'CommentName',
        'CommentEmail',
        'CommentContent', 
        'CommentPostId', 
        'CommentPostTime',
	];

    public function insertComment($data)
    {
        return $this->db
                    ->table('comments')
                    ->insert($data);
                    return true;
    }

    function getCommentFront($id)
    {
        return $this->db
                    ->table('comments')
                    ->where('CommentPostId', $id)
                    ->get()
                    ->getResultArray();
    }

    function deleteComment($CommentPostId)
    {
        $builder = $this->table($this->table);
        $builder->where('CommentId',$CommentPostId);
        if($builder->delete())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function listCommentFront($CommentPostId, $Keywords, $TotalPage,$group_dataset = null)
    {
        $builder = $this->table($this->table);
        $arrKeywords = explode(" ", $Keywords);
        $builder->groupStart();
        for($i=0; $i<count($arrKeywords);$i++)
        {
            $builder->orLike('CommentName', $arrKeywords[$i]);
            $builder->orLike('CommentContent', $arrKeywords[$i]);
        }
        $builder->groupEnd();
        $builder->where('CommentPostId', $CommentPostId);
        $builder->orderBy('CommentPostTime', 'desc');
        
        $data['record'] = $builder->paginate($TotalPage, $group_dataset);
        $data['pager'] = $builder->pager;
        return $data;
    }
    
    

}