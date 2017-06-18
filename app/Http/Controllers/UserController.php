<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\UserDepartment;
use Auth;
use App\Position;
use App\JobType;
use App\UserPositionJobtype;
use App\EmployeeRelative;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Mail;
use Excel;
use Illuminate\Support\Facades\Input;
use PDF;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile', ['user' => User::findOrFail(Auth::user()->id)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('profile', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function autocomplete(Request $request){
        $term = $request->term;
        $uData = User::where('username', 'LIKE', '%'.$term.'%')->take(10)->get();
       
        $result = array();
        foreach ($uData as $key => $value) {
            //$uDepa = UserDepartment::where('user_id', $value->id)->first();
            //$depa = DepartmentController::getDepartmentInfo($uDepa->department_id);
            $data = $value->username.' ('.$value->name.')';
            array_push($result, $data);
        }
        return $result;
    }

    public function autocomplete_department(Request $request){
        $term = $request->term;
        //$uData = User::where('username', 'LIKE', '%'.$term.'%')->take(10)->get();
        $uData = User::leftJoin('users_department', 'users.id', '=', 'users_department.user_id')->where('users_department.department_id', null)->select('users.id', 'users.name', 'users.username', 'users.gender')->get();
        $result = array();
        foreach ($uData as $key => $value) {
            $data = $value->username.' ('.$value->name.')';
            array_push($result, $data);
        }
        return $result;
    }

    public function postEditProfile($id, Request $request){
        $this->validate($request,
            [
                //'name'      =>      'required',
                'birthday'  =>      'required',
                //'permanent_address' =>  'required',
                'present_address'   =>  'required',
                'email' => ['required', Rule::unique('users')->ignore($id, 'id'), 'email'],
                'name_relative'     =>  'required',
                'address_relative'  =>  'required',
                'relationship_relative' =>  'required',
                'phone_number_relative' =>  'required'
            ],[
                //'name.required'     =>      'Bạn chưa nhập họ tên',
                'birthday.required' =>      'Bạn chưa nhập ngày sinh',
                //'permanent_address.required'    =>  'Bạn chưa nhập địa chỉ thường trú',
                'present_address.required'      =>  'Bạn chưa nhập địa chỉ hiện tại',
                'email.required'    =>      'Bạn chưa nhập địa chỉ email',
                'email.unique'      =>      'Địa chỉ email bị trùng',
                'name_relative.required'    =>      'Bạn chưa nhập tên người thân',
                'address_relative.required' =>      'Bạn chưa nhập địa chỉ người thân',
                'relationship_relative.required'    =>  'Bạn chưa nhập mối quan hệ',
                'phone_number_relative.required'     =>      'Bạn chưa nhập số điện thoại người thân'
            ]);

        if($request->birthday){
            $birthday = Carbon::createFromFormat('d/m/Y', $request->birthday)->toDateString();
        }else if($request->birthday ==null){
            $birthday = null;
        }

        $user = User::find($id);
        $user->email             = $request->email;
        $user->gender            = $request->gender;
        //$user->name              = $request->name;
        //$user->permanent_address = $request->permanent_address;
        $user->present_address   = $request->present_address;
        $user->date_of_birth     = $birthday;
        $user->phone_number      = $request->phone_number;
        $user->bank_account_name = $request->bank_account_name;
        $user->bank_name         = $request->bank_name;
        $user->save();

        if(count(EmployeeRelative::where('user_id', $id)->get()))
        {
            $employee_relative = EmployeeRelative::where('user_id', $id)->update(['full_name' => $request->name_relative, 'address' => $request->address_relative, 'phone_number' => $request->phone_number_relative, 'relation' => $request->relationship_relative]);
        }else{
            $employee_relative = new EmployeeRelative;
            $employee_relative->full_name = $request->name_relative;
            $employee_relative->address = $request->address_relative;
            $employee_relative->phone_number = $request->phone_number_relative;
            $employee_relative->relation = $request->relationship_relative;
            $employee_relative->user_id = $id;
            $employee_relative->save();
        }

        return redirect('profile/' . $id)->with('thongbao', 'Bạn đã sửa thành công');
    }

    public function postChangePassword($id, Request $request)
    {
        $message = [
                    'password_current.required' => 'Bạn chưa nhập mật khẩu hiện tại',  
                    'password_new.required' => 'Bạn chưa nhập mật khẩu mới',  
                    'password_new.min' => 'Mật khẩu ít nhất là 8 ký tự',  
                    'password_new_again.required' => 'Bạn chưa nhập lại mật khẩu',  
                    'password_new_again.same' => 'Không trùng mật khẩu',  
                   ];
        $validation = Validator::make( Input::all(), [
                               'password_current' => 'required',
                               'password_new' => 'required|min:8',
                               'password_new_again' => 'required|same:password_new',
                            ], $message);

        if( $validation->fails() )
        {
            return json_encode([
                    'errors' => $validation->errors()->getMessages(),
                    'code' => 200
                 ]);
        }

        $user = User::find($id);
        if(Hash::check($request->password_current, $user->password)==true){
           $user->password = bcrypt($request->password_new);
           $user->save();
           return json_encode([
                    'success' => 'Thanh cong',
                 ]);
        }else{
           return json_encode([
                    'errors_password' => 'Mật khẩu hiện tại không đúng',
                    'code' => 200
                 ]);
        }
    }

    public function postChangeAvatar(Request $request, $id){

        if($request->hasFile('hinh')){
            $file = $request->file('hinh'); //Lấy hình gán vào biến file
            $name = $file->getClientOriginalName(); //Lấy tên gốc của hình
            $temp = $file->getClientOriginalExtension();

            if($temp == 'jpg' || $temp == 'png'){
                $Hinh = str_random(4) . "_" . $name;
                $file->move("upload/avatar", $Hinh);

                $user = User::find($id);
                if(file_exists("upload/avatar/" . $user['avatar'])){
                    unlink("upload/avatar/" . $user['avatar']);
                }
                $user->avatar = $Hinh;
                $user->save();
                return redirect('profile/' . $id)->with('thongbao', 'Bạn đã thay đổi ảnh đại diện thành công');
            }
            return redirect('profile/' . $id)->with('loi', 'Không phải là đuôi png hoặc jpg');
        }        
    }

    public function getList(Request $request)
    {
        if (Auth::user()->can('user_show')){
            $query = User::query();  
            if($request->code != "")
                $query->where("username", "like", "%". trim($request->code). "%")->get();
            if($request->name != "")
                $query->where("name", "like", "%". trim($request->name). "%")->get();
            if($request->gender != ""){
                $query->where("gender", $request->gender)->get();
            }else{
                $request->gender = 2;
            }
            //$user = $query->get();
            $user = $query->paginate(10);
            return view('employee.list', ['user' => $user, 'username' => $request->code, 'name' => $request->name, 'gender' => $request->gender, 'email' => $request->email]);
        }
    }

    public function getExport()
    {
        $fileName = "DanhSachNhanVien_".date('d-m-Y_H:i:s');
        $user = User::all();
        Excel::create($fileName, function($excel) use($user){
            $excel->sheet('test1', function($sheet) use($user){
                $sheet->loadView('employee.export', ['user' => $user]);

                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  14,
                    )
                ));
            });

        })->export('xlsx');  
    }

    public function getExportPdf()
    {
        $fileName = "DanhSachNhanVien_".date('d-m-Y_H:i:s');
        $user = User::all();
        $pdf = PDF::loadView('employee.export_pdf', ['user' => $user]);
        return $pdf->stream($fileName . '.pdf');
    }

    public function getImport()
    {
        return view('employee.import');
    }

    public function postImport(Request $request)
    {
        if(Input::hasFile('import_file')){
            $file = $request->file('import_file');
            $temp = $file->getClientOriginalExtension();

            if($temp == 'xlsx'){
                $path = Input::file('import_file')->getRealPath();
                $data = Excel::load($path, function($reader) {})->get();

                if(!empty($data) && $data->count()){
                    foreach ($data as $key => $value) {
                        if(count(User::where('email', $value->email)->get())){
                            continue;
                        } 

                        if(count(User::where('name', $value->ho_ten)->get())){
                            $username = getUsername($value->ho_ten) . $key;
                        }else{
                            $username = getUsername($value->ho_ten);
                        } 

                        if(!empty($value->ngay_sinh)){
                            $birthday = Carbon::createFromFormat('d/m/Y', $value->ngay_sinh)->toDateString();
                        }else{
                            $birthday = null;
                        }

                        if(!empty($value->ngay_cap)){
                            $date_CMND = Carbon::createFromFormat('d/m/Y', $value->ngay_cap)->toDateString();
                        }else{
                            $date_CMND = null;
                        }

                        if(!empty($value->ngay_vao_lam)){
                            $joining_date = Carbon::createFromFormat('d/m/Y', $value->ngay_vao_lam)->toDateString();
                        }else{
                            $joining_date = null;
                        }

                        if($value->gioi_tinh == 'Nam'){
                            $gender = 1;
                        }
                        else{
                            $gender = 0;
                        }

                        $insert[] = ['username' => $username, 'name' => $value->ho_ten, 'email' => $value->email, 'password' => bcrypt('123456'), 'gender' => $gender, 'date_of_birth' => $birthday, 'CMND' => $value->cmnd, 'date_CMND' => $date_CMND, 'address_CMND' => $value->noi_cap,'joining_date' => $joining_date, 'permanent_address' => $value->dia_chi_thuong_tru, 'present_address' => $value->dia_chi_hien_tai, 'phone_number' => $value->so_dien_thoai, 'bank_name' => $value->ten_tai_khoan_ngan_hang, 'bank_account_name' => $value->so_tai_khoan_ngan_hang, 'nationality' => $value->quoc_tich, 'ethnic' => $value->dan_toc];
                    }
                    if(!empty($insert)){
                        try{
                            User::insert($insert);
                            return redirect('employee');
                        } 
                        catch(\Exception $e){
                            return redirect('employee/import')->with('loi', 'Trong file có email bị trùng');
                        }
                    }
                }
            }else{
                return redirect('employee/import')->with('loi', 'Không phải file excel');
            }
            
        }
        
    }
    public function getAdd()
    {
        //if (Auth::user()->can('user_show')){
            $department = Department::all();
            $position = Position::all();
            $jobtype = JobType::all();
            return view('employee.add', ['department' => $department, 'position' => $position, 'jobtype' => $jobtype]);
        //}
    }

    public function postGetUsername(Request $request)
    {
        $username = getUsername($request->name);
        return $username;
    }

    public function postAdd(Request $request)
    {
        $this->validate($request, [
                'name'                  =>  'required',
                'birthday'              =>   'required',
                'CMND'                  =>   'required',
                'date_CMND'             =>   'required',
                'address_CMND'          =>  'required',
                'permanent_address'     => 'required',
                'present_address'       => 'required',
                'email'                 =>  'required|email|unique:users,email',
                'username'              => 'required|unique:users,username',
                ],[
                'name.required'         => 'Bạn chưa nhập họ tên',
                'birthday.required'     =>      'Bạn chưa nhập ngày sinh',
                'CMND.required'         =>      'Bạn chưa nhập số CMND',
                'date_CMND.required'    =>      'Bạn chưa nhập ngày cấp CMND',
                'address_CMND.required' =>      'Bạn chưa nhập nơi cấp CMND',
                'permanent_address.required'        =>      'Bạn chưa nhập nơi đăng ký hộ khẩu',
                'present_address.required'  =>      'Bạn chưa nhập chỗ ở hiện tại',
                'email.required'        => 'Bạn chưa nhập email',
                'email.email'           => 'Không đúng định dạng email',
                'email.unique'           => 'Email bị trùng',
                'username.required'     => 'Bạn chưa nhập username', 
                'username.unique'       => 'Username bị trùng'            
                ]);

        if($request->birthday){
            $birthday = Carbon::createFromFormat('d/m/Y', $request->birthday)->toDateString();
        }else{
            $birthday = null;
        }

        if($request->joining_date){
            $joining_date = Carbon::createFromFormat('d/m/Y', $request->joining_date)->toDateString();
        }else{
            $joining_date = null;
        }

        if($request->date_CMND){
            $date_CMND = Carbon::createFromFormat('d/m/Y', $request->date_CMND)->toDateString();
        }else{
            $date_CMND = null;
        }

        DB::beginTransaction();

        try {
            $user = new User;
            $user->username          = $request->username;
            $user->email             = $request->email;
            $user->password          = bcrypt('123456');
            $user->active            = 1;
            $user->gender            = $request->gender;
            $user->avatar            = "";
            $user->name              = $request->name;
            $user->permanent_address = $request->permanent_address;
            $user->present_address   = $request->present_address;
            $user->date_of_birth     = $birthday;
            $user->joining_date      = $joining_date;
            $user->nationality       = $request->nationality;
            $user->ethnic            = $request->ethnic;
            $user->phone_number      = $request->phone_number;
            $user->bank_account_name = $request->bank_account_name;
            $user->bank_name         = $request->bank_name;
            $user->CMND              = $request->CMND;
            $user->date_CMND         = $date_CMND;
            $user->address_CMND      = $request->address_CMND;
            $user->save();

            $user_id = $user->id;
            $user_department = new UserDepartment;
            $user_department->user_id = $user_id;
            $user_department->department_id = $request->department;
            $user_department->save();

            $user_position_jobtype = new UserPositionJobtype;
            $user_position_jobtype->user_id = $user_id;
            $user_position_jobtype->position_id = $request->position;
            $user_position_jobtype->jobtype_id = $request->job_type;
            $user_position_jobtype->save();

            $employee_relative = new EmployeeRelative;
            $employee_relative->full_name = $request->relative_name;
            $employee_relative->address = $request->relative_address;
            $employee_relative->phone_number = $request->relative_phone_number;
            $employee_relative->relation = $request->relative_relation;
            $employee_relative->user_id = $user_id;
            $employee_relative->save();

            $email = $request->email;
            $name = $request->name;
            //Gửi mail về cho user khi tạo user thành công
            $data = array('email' => $email, 'name' => $name);
            Mail::send('mail.mail', $data, function ($message) use ($email, $name) {
                $message->from('efode2017@gmail.com', 'Công Bình');
            
                $message->to($email, $name);
                                    
                $message->subject('Mail công ty');

            });



             DB::commit();
            return redirect('employee/add')->with('thongbao', 'Bạn đã thêm thành công');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function getEdit($id)
    {
        //if (Auth::user()->can('staff_edit')) {
            $user = User::find($id);
            $department = Department::all();
            $position = Position::all();
            $jobtype = JobType::all();
            return view('employee.edit', ['department' => $department, 'position' => $position, 'jobtype' => $jobtype, 'user' => $user]);
        //}else{
        //    return  redirect()->back()->with('msg','Bạn không có quyền này.');
        //}
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
                'name'                  =>  'required',
                'birthday'              =>   'required',
                'CMND'                  =>   'required',
                'date_CMND'             =>   'required',
                'address_CMND'          =>  'required',
                'permanent_address'     => 'required',
                'present_address'       => 'required',
                'email' => ['required', Rule::unique('users')->ignore($id, 'id'), 'email'],
                'username' => ['required', Rule::unique('users')->ignore($id, 'id')],
                ],[
                'name.required'         => 'Bạn chưa nhập họ tên',
                'birthday.required'     =>      'Bạn chưa nhập ngày sinh',
                'CMND.required'         =>      'Bạn chưa nhập số CMND',
                'date_CMND.required'    =>      'Bạn chưa nhập ngày cấp CMND',
                'address_CMND.required' =>      'Bạn chưa nhập nơi cấp CMND',
                'permanent_address.required'        =>      'Bạn chưa nhập nơi đăng ký hộ khẩu',
                'present_address.required'  =>      'Bạn chưa nhập chỗ ở hiện tại',
                'email.required'        => 'Bạn chưa nhập email',
                'email.email'           => 'Không đúng định dạng email',
                'email.unique'           => 'Email bị trùng',
                'username.required'     => 'Bạn chưa nhập username', 
                'username.unique'       => 'Username bị trùng'            
                ]);

        if($request->birthday){
            $birthday = Carbon::createFromFormat('d/m/Y', $request->birthday)->toDateString();
        }else if($request->birthday ==null){
            $birthday = null;
        }

        if($request->joining_date){
            $joining_date = Carbon::createFromFormat('d/m/Y', $request->joining_date)->toDateString();
        }else if($request->joining_date ==null){
            $joining_date = null;
        }

        if($request->date_CMND){
            $date_CMND = Carbon::createFromFormat('d/m/Y', $request->date_CMND)->toDateString();
        }else if($request->date_CMND ==null){
            $date_CMND = null;
        }

         DB::beginTransaction();

        try {
            $user = User::find($id);
            $user->username          = $request->username;
            $user->email             = $request->email;
            $user->gender            = $request->gender;
            $user->name              = $request->name;
            $user->permanent_address = $request->permanent_address;
            $user->present_address   = $request->present_address;
            $user->date_of_birth     = $birthday;
            $user->joining_date      = $joining_date;
            $user->nationality       = $request->nationality;
            $user->ethnic            = $request->ethnic;
            $user->phone_number      = $request->phone_number;
            $user->bank_account_name = $request->bank_account_name;
            $user->bank_name         = $request->bank_name;
            $user->CMND              = $request->CMND;
            $user->date_CMND         = $date_CMND;
            $user->address_CMND      = $request->address_CMND;
            $user->save();

            if(count(UserDepartment::where('user_id', $id)->get())){
                $user_department = UserDepartment::where('user_id', $id)->update(['department_id' => $request->department]);

            }else{
                $user_department = new UserDepartment;
                $user_department->user_id = $id;
                $user_department->department_id = $request->department;
                $user_department->save();   
            }
            
            if(count(UserPositionJobtype::where('user_id', $id)->get()))
            {
                 $user_position_jobtype = UserPositionJobtype::where('user_id', $id)->update(['position_id' => $request->position, 'jobtype_id' => $request->job_type]);
             }else{
                $user_position_jobtype = new UserPositionJobtype;
                $user_position_jobtype->user_id = $id;
                $user_position_jobtype->position_id = $request->position;
                $user_position_jobtype->jobtype_id = $request->job_type;
                $user_position_jobtype->save();
             }

            if(count(EmployeeRelative::where('user_id', $id)->get()))
            {
                $employee_relative = EmployeeRelative::where('user_id', $id)->update(['full_name' => $request->relative_name, 'address' => $request->relative_address, 'phone_number' => $request->relative_phone_number, 'relation' => $request->relative_relation]);
            }else{
                $employee_relative = new EmployeeRelative;
                $employee_relative->full_name = $request->relative_name;
                $employee_relative->address = $request->relative_address;
                $employee_relative->phone_number = $request->relative_phone_number;
                $employee_relative->relation = $request->relative_relation;
                $employee_relative->user_id = $id;
                $employee_relative->save();
            }
            
             DB::commit();
            return redirect('employee/edit/' . $id)->with('thongbao', 'Bạn đã sửa thành công');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function postDelete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
    }
}
