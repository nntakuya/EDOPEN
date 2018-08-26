<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserRequest $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $email = $request->email;
        //メールアドレスのローカルパートを取得
        //例：xxx@aaa.bbbのxxxの部分
        $localpart = substr($email,0, strpos($email,"@"));

        // TODO: 取得メールアドレスにメールを送信

        //Modelに反映
        $user = new User;
        $user->name = $localpart;
        $user->email = $request->email;
        //ハッシュ化し、DBに反映
        $user->password = Hash::make($request->password);



        $user->save();

        info('user : '.$user);

        return view('user.register');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    public function edit()
    {
        //（疑問）User_idを取得する場合は、『編集フォーム』から取得した方が良いのか、それとも、ログインユーザーのIDをそのまま取得した方がいいのか。
        // info('ID : '.Auth::user()->id);
        $user = User::find(Auth::user()->id);
        // info('ユーザー情報 : '.$user);

        return view('user.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        //下記コピペなので、編集必須

        info('update');
        info($request);

        // POSTバリデーション
        if ($request->isMethod('POST')) {
            info('POST VALIDATAION');

            // 商品情報の保存
            // $item = Item::create(['jan'=> $request->jan, 'name'=> $request->name]);

            // 商品画像の保存
            foreach ($request->file('files') as $index=> $e) {
                // $ext = $e['photo']->guessExtension();
                // $filename = "{$request->jan}_{$index}.{$ext}";
                // $path = $e['photo']->storeAs('images', $filename);

                // infro($path);
                // photosメソッドにより、商品に紐付けられた画像を保存する
                // $item->photos()->create(['path'=> $path]);
            }

            return redirect('/user/edit');
        }

        // GET
        return view('user.edit');
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

    public function getAuth(Request $request){
        $param = ['message'=>'ログインしてください。'];
        return view('user.login',$param);
    }


    public function postAuth(Request $request){
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email'=>$email, 'password'=>$password])) {
            return redirect('index');
        }

        return view('users.login', ['message'=>'ログインに失敗しました。']);
    }

    public function getLogout(){
        Auth::logout();//ログアウト

        return redirect('users/login');
    }

}
