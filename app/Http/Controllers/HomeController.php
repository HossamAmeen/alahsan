<?php

namespace App\Http\Controllers;
use App\Http\Controllers\APIResponseTrait;
use App\Models\{Course,Article,Department,Configration ,Event, Complaint , Team};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use APIResponseTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function events()
    {
        $data = Event::orderBy('id', 'DESC')->get();
        return $this->APIResponse($data, null, 200);
    }
    public function articles($id = null )
    {
        if($id == null)
        $data = Article::orderBy('id', 'DESC')->get(['id','title' , 'description' ,'image']);
        else
        $data = Article::find($id);
        if(!isset($data)){
            return $this->APIResponse(null, null, 404);
        }
        return $this->APIResponse($data, null, 200);
    }
    public function departments()
    {
        $data = Department::orderBy('id', 'DESC')->get();
        return $this->APIResponse($data, null, 200);
    }
    public function courses()
    {
        $data = Course::orderBy('id', 'DESC')->get();
        return $this->APIResponse($data, null, 200);
    }
    public function home()
    {
        $data = Configration::first();
        return $this->APIResponse($data, null, 200);
    }
    public function teamwork()
    {
        $data = Team::orderBy('id', 'DESC')->get();
        return $this->APIResponse($data, null, 200);
    }
    public function complaint(Request $request)
    {
        if($request->complaint == null || $request->complaint == " ")
        {
            return $this->APIResponse(null, 'complaint is required', 400);
        }
        Complaint::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'complaint' => $request->complaint
        ]);
        return $this->APIResponse(null, null, 200);
    }
    public function conditions()
    {
        $configration = Configration::find(1);
        return view('condition' , compact('configration'));
    }
}
