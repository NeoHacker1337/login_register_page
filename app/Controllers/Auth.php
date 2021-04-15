<?php namespace App\Controllers;

use  App\Models\UsersModel;
use App\Libraries\Hash;

class Auth extends BaseController
{

   // public function __construct()
   // {
   //     helper(['url', 'form']);
   // }

    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register',['validation' => '']);
    }

    public function save()
    {

        $validation = $this->validate([
          'name'=> [
          'rules' =>'required',
          'errors'=>[
          'required'=>'Your Full Name is Required'
          ]
        ],
        'email' =>[
          'rules' =>'required|valid_email|is_unique[users.email]',
          'errors'=>[
            'required'=>'Email is Required',
            'valid_email'=>'You must enter a valid email',
            'is_unique'=>'Email already taken'
          ]
        ],
        'password'=>[
          'rules'=>'required|min_length[5]|max_length[12]',
          'errors'=>[
            'required'=>'Password is required',
            'min_length'=>'Password must have atleast 5 characters in length',
            'max_length'=>'Password must not have characters more than 12 in length'
          ]
        ],
        'cpassword'=>[
          'rules'=>'required|min_length[5]|max_length[12]|matches[password]',
          'errors' =>[
            'required'=>'Confirm password is required',
            'min_length'=>'Confirm Password must have atleast 5 characters in length',
            'max_length'=>'Confirm Password must not have characters more than 12 in length'
          ]
        ]
      ]);

        if(!$validation){
           return view('auth/register',['validation' => $this->validator]);
        }
        else{

          $name = $this->request->getPost('name');
          $email = $this->request->getPost('email');
          $password = $this->request->getPost('password');

          $values = [
            'name' => $name,
            'email' => $email,
            'password'=> password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
          ];
        //  $db = \Config\Database::connect();

          $usersModel = new \App\Models\UsersModel();
          $query = $usersModel->insert($values);  //this Line Insert Data Into Database
          if(!$query){
            return redirect()->back()->with('fail','Something Went Wrong');
          }else {
              return redirect()->to('register')->with('success','You Are Now Registerd Successfully');
          }
        }
    }

    public function check(){
      //validation check
      $session = session();
      $validation = $this->validate([
        'email'=>[
          'rules' => 'required|valid_email|is_not_unique[users.email]',
          'errors' =>[
            'required' => 'Email is required',
            'valid_email'=> 'Enter a valid email address',
            'is_not_unique'=>'This email is not Registered on our service'
          ]
        ],
        'password' =>[
          'rules'=>'required|min_length[5]|max_length[12]',
          'errors' =>[
            'required'=>'Confirm password is required',
            'min_length'=>'Password must have atleast 5 characters in length',
            'max_length'=>'Password must not have characters more than 12 in length'
        ]
      ]
      ]);

      if(!$validation){
        return view('auth/login',['validation'=>$this->validator]);
      }else{

        $email = $this->request->getPost('email');
        $passsword1 = $this->request->getPost('password');

        $usersModel = new \App\Models\UsersModel();
        $user_info = $usersModel->where('email', $email)->first();

        $data = $usersModel->where('email', $email)->first();

    //    $check_password = $usersModel->where('password', $password)->first();
    if($data){
          $pass = $data['password'];
          $verify_pass = password_verify($passsword1, $pass);
          if($verify_pass){
              $ses_data = [
                  'id'       => $data['id'],
                  'name'     => $data['name'],
                  'email'    => $data['email'],
                  'logged_in'     => TRUE
              ];
            //  $session->set($ses_data);
          echo "Dashboard";  //return redirect()->to('/dashboard');
          }else{
            //  $session->setFlashdata('msg', 'Wrong Password');
            return redirect()->back()->with('fail','Wrong Password');
          }
      }else{
        //  $session->setFlashdata('msg', 'Email not Found');
       return redirect()->back()->with('fail','Something Went Wrong');
      }
    }
  }
}
