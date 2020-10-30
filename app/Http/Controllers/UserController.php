<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use DB;


Class UserController extends Controller {


    private $request;
    use ApiResponser;

        public function __construct(Request $request){
            $this->request = $request;
            }

  

        public function getUsers(){

            $users = DB :: connection('mysql') ->select ("SELECT * FROM tbluser");

            return response()->json($users, 200);
           
            }


        public function login(){
            return view('login');
        }
            // LOGIN 
        public function verifyUser(){
                
            $username = $_POST['username'];
            $password = $_POST['password'];
        

            $user = app('db')->select("SELECT * FROM tbluser WHERE username='$username' AND password='$password'");

            if(empty($user)){
                return 'Invalid Username or Password!';
            }
            else{
                return "You are successfully Logged In!";
            }
            
            
        }
            // ADD USER
        public function addUser(Request $request){

            $require =  [ 'username' => 'required|max:255',
                        'password' => 'required|max:255'
            ];
            

            $this->validate($request,$require);

            $user = User::create($request->all());

            return $this->successResponse($user,RESPONSE::HTTP_CREATED);


        }


        // SEARCH USER

        public function searchUser($id){
            $user = User::find($id);
            if($user == null) return response()->json('User not in Database!!!');

            return $user;
        }

   

        // UPDATE USER

        
    public function updateUser(Request $request,$id){

        $require = ['username' => 'required|max:255',
                    'password' => 'required|max:255'
        ];


        $this->validate($request,$require);

        $user = User::find($id);

        if($user == null)return response()->json('User not in Database!!!');
   
        $user->fill($request->all());

        $user->save();

        print ("User Updated");

        return $this->successResponse($user);
        
    }

    // DELETE USER

    public function deleteUser($id){
      
        User::findOrFail($id)->delete();
        return response()->json('User Deleted Successfully');
        
    }

 
    
}


?>