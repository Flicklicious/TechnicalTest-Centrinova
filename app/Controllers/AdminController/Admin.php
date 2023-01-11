<?php
namespace App\Controllers\AdminController;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\AdminModelArticle;

class Admin extends BaseController
{
	public function __construct()
	{
		$db = db_connect();
		$this->m_admin = new AdminModel($db);
		$this->m_admin_article = new AdminModelArticle();

		$this->validation = \Config\services::validation();

		helper("cookie");
		helper("global_function_helper");
	}

	public function index()
	{
		$data['count_article'] = $this->m_admin_article->getPostCount();
		$data['result_user'] = $this->m_admin->retrive_list_user();
		$data['result_count'] = $this->m_admin->retrive_list_user_count_user();
		return view('v_admin/v_a_index', $data);
	}

	public function create_user()
	{
		return view('v_admin/v_a_insert_user');
	}

	public function list_user()
	{
		$data['result_user'] = $this->m_admin->retrive_list_user();
		return view('v_admin/v_a_list_user', $data);
	}

	public function savedata_user()
	{

		if ($this->request->getPost('save'))
		{
			$CreatedBy = session()->get('AccountUsername');
			date_default_timezone_set("Asia/Jakarta");
			$currentDate = date("Y-m-d\TH:i:s");
			$password = password_hash($this->request->getPost('Password'),PASSWORD_DEFAULT);
			$data['Username'] = $this->request->getPost('Username');
			$data['Password'] = $password;
			$data['FullName'] = $this->request->getPost('FullName');
			$data['Email'] = $this->request->getPost('Email');
			$data['CreatedBy'] = $CreatedBy;
			$data['CreatedDate'] = $currentDate;

			$response = $this->m_admin->saverecords_user($data);
			if ($response == true)
			{
				echo "<script>alert('Records Saved Successfully');</script>";
                return redirect()->to('admin/list-user/input-user');
			}
			else
			{
				echo "<script>alert('Insert Error !');</script>";
			}
		}
	}

	
	public function editdata_user($id)
	{
		$data = [];
		$DataPost = $this->m_admin->getDataUserEdit($id);
		if(empty($DataPost))
		{
			return redirect()->to(base_url('admin/index'));
		}
		$data = $DataPost;

		if($this->request->getMethod()=='post')
		{
			$data = $this->request->getVar(); //return inputed data to views

			$rules =
			[
				'Username' =>[
					'rules' => 'required',
					'errors' => ['required' => 'Username tidak boleh kosong'],
				],
				'Password' =>[
					'rules' => 'required',
					'errors' => ['required' => 'Password tidak boleh kosong'],
				],
				'FullName' =>[
					'rules' => 'required',
					'errors' => ['required' => 'Nama tidak boleh kosong'],
				],
				'Email' =>[
					'rules' => 'required',
					'errors' => ['required' => 'Email tidak boleh kosong'],
				],
			];

			if(!$this->validate($rules))
			{
				session()->setFlashdata('warning', $this->validation->getErrors());
			}
			else
			{	
				$EditedBy = session()->get('AccountUsername');
				date_default_timezone_set("Asia/Jakarta");
				$currentDate = date("Y-m-d\TH:i:s");
				// $record =
				// [
				// 	'Username' => $this->request->getVar('Username'),
				// 	'Password' => $this->request->getVar('Password'),
				// 	'FullName' => $this->request->getVar('FullName'),
				// 	'Email' => $this->request->getVar('Email'),
				// 	'EditedDate' => $currentDate,
				// 	'EditedBy' => $EditedBy,
				// 	'IdUser' => $id
				// ];
				$record['Username'] = $this->request->getVar('Username');
				$record['FullName'] = $this->request->getVar('FullName');
				$record['Email'] = $this->request->getVar('Email');
				$record['EditedDate'] = $currentDate;
				$record['EditedBy'] = $EditedBy;
				$record['IdUser'] = $id;

				$action = $this->m_admin->updateDataUser($record);
				if($action != false)
				{
					return redirect()->to(base_url('admin/index'));
				}
				else
				{
					session()->setFlashdata('warning', 'Failed To Edit Records.');
					return redirect()->to(base_url('admin/edit-user/edit/'.$id));
				}
			}

		}
		echo view('v_admin/v_a_edit_user', $data);	
	}

	public function login()
	{
		$data = [];
		if (get_cookie('cookie_username') && get_cookie('cookie_password'))
		{
			$UserName = get_cookie('cookie_username');
			$Password = get_cookie('cookie_password');

			$dataAccount = $this->m_admin->getDataUser($UserName);

			if($Password != $dataAccount['Password'])
			{
				$show_error[] = "Account or password is invalid.";
				session()->setFlashdata('Username', $UserName);
				session()->setFlashdata('warning', $show_error); 

				delete_cookie('cookie_username');
				delete_cookie('cookie_password');

				return redirect()->to(base_url('admin/login'));
			}
			else
			{
				$account = 
				[
					'AccountUsername'=> $UserName,
					'FullName'=> $dataAccount['FullName'],
					'AccountEmail'=> $dataAccount['Email'],
					'AccountId'=> $dataAccount['IdUser'],

				];
				session()->set($account);
				return redirect()->to(base_url('admin/index'));
			}
		}
		if ($this->request->getMethod() == 'post') 
		{
			$rules = 
			[
				'Username' => 
				[
					'rules'=> 'required',
					'errors' => 
					[
						'required' => 'Username harus diisi'
					]
				],
				'Password' =>
				[
					'rules' => 'required',
					'errors' =>
					[
						'required' => 'Password harus diisi'
					]
				]
			];

			if(!$this->validate($rules))
			{
				session()->setFlashdata("warning", $this->validation->getErrors());
				return redirect()->to(base_url('admin/login'));
			}

			$Username = $this->request->getVar('Username');
			$Password = $this->request->getVar('Password');
			$RememberMe = $this->request->getVar('RememberMe');

			$dataAccount = $this->m_admin->getDataUser($Username);
			if(!password_verify($Password, $dataAccount['Password']))
			{
				$show_error[] = "Account or password is invalid.";
				session()->setFlashdata('username', $Username);
				session()->setFlashdata('warning', $show_error);
				return redirect()->to(base_url('admin/login'));
			}

			if ($RememberMe == '1')
			{
				//Cookie tersimpan 30 hari
				set_cookie("cookie_username", $Username, 3600*24*30);
				set_cookie("cookie_password", $dataAccount['Password'], 3600*24*30);
			}

			$account = 
			[
				'AccountUsername' =>$dataAccount['Username'],
				'AccountFullName' =>$dataAccount['FullName'],
				'AccountEmail' => $dataAccount['Email'],
				'AccountId' => $dataAccount['IdUser']
			];
			session()->set($account);
			return redirect()->to(base_url('admin/index'))->withCookies();
			//return redirect()->to(base_url('admin/index'));

		}

		echo view("v_admin/v_a_login", $data);
	}

	public function logout()
	{
		date_default_timezone_set("Asia/Jakarta");
		$LastLogin = date("Y-m-d\TH:i:s");
		$AccountEmail = session()->get('AccountEmail');
		
		$dataAccount = $this->m_admin->getDataUser($AccountEmail);
		if($dataAccount['Email'] != $AccountEmail)
		{
			$show_error[] = "Email is invalid!.";

		}
		else
		{
			$dataAccount = $this->m_admin->getDataUser($AccountEmail);
			$dataUpdate =
					[
						'Email' => $AccountEmail,
						'LastLogin' => $LastLogin
					];
			$this->m_admin->updateDataUser($dataUpdate);
		}

		delete_cookie("cookie_username");
		delete_cookie("cookie_password");
		session()->destroy();

		if (session()->get('AccountUsername') != '')
		{

			session()->setFlashdata("success", "Logout Successfully");
			
		}
		
		
		return redirect()->to(base_url('admin/login'));
	}

	public function forgot_password()
	{
		$show_error = [];
		if($this->request->getMethod()=='post')
		{
			$Username = $this->request->getVar('Username');
			if($Username =='')
			{
				$show_error[] = "Insert your username or email."; 
			}
			if(empty($show_error))
			{
				$data = $this->m_admin->getDataUser($Username);
				if(empty($data))
				{
					$show_error[] = "Your username or email not registered.";
				}
			}

			if(empty($show_error))
			{
				$Email = $data['Email'];
				$Token = md5(date('ymdhis'));

				$link = base_url("admin/reset-password/?Email=$Email&Token=$Token");
				$attachment = "";
				$to = $Email;
				$title = "Reset Password";
				$message = "Link to reset your password.";
				$message .= "Click this link $link";

				//this function is coming from Helpers/global_function_helper.php
				sent_email($attachment,$to,$title,$message);



				$dataUpdate =
				[
					'Email'=>$Email,
					'Token'=>$Token
				];

				$this->m_admin->updateDataUser($dataUpdate);
				session()->setFlashdata("success" , "Recovery mail has been sent to your email.");
			}

			if($show_error)
			{
				session()->setFlashdata("Username", $Username);
				session()->setFlashdata("warning", $show_error);
			}
			return redirect()->to(base_url('admin/forgot-password'));
		}
		echo view('v_admin/v_a_forgot');
	}

	public function reset_password()
	{
		$show_error = [];
		$email = $this->request->getVar('Email');
		$Token = $this->request->getVar('Token');
		if($email != '' and $Token != '')
		{
			$dataAccount = $this->m_admin->getDataUser($email);
			if($dataAccount['Token'] != $Token)
			{
				$show_error[] = "Token is invalid.";
			}

		}
		else
		{
			$show_error[] = "Paramater has been sent is invalid.";
		}

			if($show_error)
			{
				session()->setFlashdata("warning", $show_error);
			}

			if($this->request->getMethod() =='post')
			{
				$rules =
				[
					'Password'=>
					[
						'rules' => 'required|min_length[5]',
						'errors'=>
						[
							'required'=> 'Password be must filled.',
							'min_length'=> 'Minimum password 5 Chracters.'
						]
					],
					'PasswordConfirmation'=>
					[
						'rules' => 'required|min_length[5]|matches[Password]',
						'errors'=>
						[
							'required'=> 'Password Confirmation be must filled.',
							'min_length'=> 'Minimum confirmation 5 Chracters.',
							'matches'=> 'Password is not matches.'
						]
					]
				];

				if(!$this->validate($rules))
				{
					session()->setFlashdata('warning', $this->validation->getErrors());
				}
				else
				{
					$dataUpdate =
					[
						'Email' => $email,
						'Password' => password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT),
						'Token' => null
					];
					$this->m_admin->updateDataUser($dataUpdate);
					session()->setFlashdata('success', 'Password Successfuly Changed.');
					delete_cookie('cookie_username');
					delete_cookie('cookie_password');
					return redirect()->to(base_url('admin/login'));
				}
			}
		
		echo view('v_admin/v_a_reset_password');
	}


}
?>