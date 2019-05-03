<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;

class LoginController extends Controller
{
	public function postLogin(Request $request)
	{
		$rules = [
			'username' => 'required|min:3|max:50',
			'password' => 'required|min:6|max:32',
		];
		$messengers = [
    			'username.required' => 'Bạn chưa nhập Tên tài khoản!',
    			'username.min' => 'Tên tài khoản gồm tối thiểu 3 ký tự!',
    			'username.max' => 'Tên tài khoản không được vượt quá 50 ký tự!',
    			'password.required' => 'Bạn chưa nhập mật khẩu!',
    			'password.min' => 'Mật khẩu gồm tối thiểu 6 ký tự!',
    			'password.max' => 'Mật khẩu không được vượt quá 32 ký tự!',
		];
		$validate = Validator::make($request->all(), $rules, $messengers);
		if($validate->fails()){
			return response()->json([
				'error' => true,
				'message' => $validate->errors()
			], 200);
		}else{
			$username = usernamechange($request->username);
			$password = $request->password;
			if(Auth::attempt(['username' => $username, 'password' => $password], true)){
				# Đăng nhập thành công
				return response()->json([
					'error' => false,
					'message' => 'Đăng nhập thành công!',
				], 200);
			}else{
				#Đăng nhập thất bại
				return response()->json([
					'error' => true,
					'message' => array(
						'thongbao' => [0 => 'Tài khoản hoặc Mật khẩu không chính xác!'],
					)
				], 200);
			}
		}
	}
	public function postRegister(Request $request)
	{
		$rules = [
			'username' => 'required|min:3|max:50|unique:users,username',
			'name' => 'required',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6|max:32',
			'password_again' => 'required|same:password'
		];
		$messengers = [
    			'name.required' => 'Bạn chưa nhập Tên!',
    			'username.required' => 'Bạn chưa nhập Tên tài khoản!',
    			'username.min' => 'Tên tài khoản gồm tối thiểu 3 ký tự!',
    			'username.max' => 'Tên tài khoản không được vượt quá 50 ký tự!',
    			'username.unique' => 'Tên tài khoản đã tồn tại!',
    			'email.required' => 'Bạn chưa nhập địa chỉ Email!',
    			'email.email' => 'Bạn chưa nhập đúng định dạng Email!',
    			'email.unique' => 'Địa chỉ Email đã tồn tại!',
    			'password.required' => 'Bạn chưa nhập mật khẩu!',
    			'password.min' => 'Mật khẩu gồm tối thiểu 6 ký tự!',
    			'password.max' => 'Mật khẩu không được vượt quá 32 ký tự!',
    			'password_again.required' => 'Bạn chưa xác nhận mật khẩu!',
    			'password_again.same' => 'Mật khẩu xác nhận chưa khớp với mật khẩu đã nhập!'
		];
		$validate = Validator::make($request->all(), $rules, $messengers);
		if($validate->fails()){
			return response()->json([
				'error' => true,
				'message' => $validate->errors()
			], 200);
		}else{
			$request->email = emailchange($request->email);
			$request->username = usernamechange($request->username);
			if($request->email == false){
				# Trường hợp Email Sai Định Dạng:
				return response()->json([
					'error' => true,
					'message' => array(
						'email' => [0 => 'Email nhập vào không được chấp nhận'],
					)
				], 200);
			}else if($request->username == false){
				return response()->json([
					'error' => true,
					'message' => array(
						'username' => [0 => 'Tên tài khoản nhập vào không được chấp nhận'],
					)
				], 200);
			}else{
		    	$user = new User;
		    	$user->name = $request->name;
		    	$user->username = $request->username;
		    	$user->email = $request->email;
		    	$user->password = bcrypt($request->password_again);
		    	$user->chucvu = 1;
		    	$user->save();
				return response()->json([
					'error' => false,
					'message' => 'Đăng ký thành viên thành công. Vui lòng đăng nhập với thông tin vừa đăng ký để hoàn tất đăng ký',
				], 200);
			}
		}
	}
}
