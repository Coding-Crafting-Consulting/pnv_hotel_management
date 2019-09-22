<?php

namespace App\Http\Controllers;

use App\User;
use App\UserType;
use App\Title;
use App\Country;
use App\Company;
use App\IdentificationType;
use App\UsersCompany;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkIfAllowed', ['except' => ['create', 'edit', 'store', 'update']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $userTypes = UserType::with(['users' => function ($user) { $user->orderBy('first_name'); }])
        ->orderBy('id')
        ->get();
    
      return view('user/index', compact('userTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        $userTypes = UserType::orderBy('id')->get();
        $titles = Title::orderBy('id')->get();
        $identificationTypes = IdentificationType::orderBy('id')->get();
        $countries = Country::orderBy('label')->get();
        $companies = Company::orderBy('label')->get();
        
        $userCompanyIds = $user->companies
            
            ->map(function($company, $key){
                return $company->id;
              })

            ->toArray();


        return view(
          'user/create',
          compact('user', 'userTypes', 'titles', 'countries', 'companies', 'userCompanyIds', 'identificationTypes')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
      $user = new User($request->all());
      
      $validator = Validator::make($request->all(), $user->rules(), $user->messages);

      if ($validator->fails()) {
        return redirect()->route('users.create')->withErrors($validator)->withInput();
      }

      $user->password = Hash::make($request->password);
      $user->save();

      // saving companies linked to the user
      if ($request->input('company_id') != NULL) {
        foreach ($request->input('company_id') as $companyId) {
          $usersCompany = new UsersCompany;
          $usersCompany->user_id = $user->id;
          $usersCompany->company_id = $companyId;
          $usersCompany->save();
        }
      }

      return Auth::check() ?
          redirect()->route('users.index')->with('success','Add success!') :
          redirect()->route('login')->with('success','Add success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user/show', compact('user'));
        return redirect()->route('users.index')->with('success','Add success!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (!Auth::check()) {

          return view('forbidden');
        
        } elseif (Auth::user()->hasAdminRights()) {

        } elseif (Auth::id() != $user->id) {

          return view('forbidden');

        }


        $userTypes = UserType::orderBy('id')->get();
        $titles = Title::orderBy('id')->get();
        $identificationTypes = IdentificationType::orderBy('id')->get();
        $countries = Country::orderBy('label')->get();
        $companies = Company::orderBy('label')->get();
        
        $userCompanyIds = $user->companies
            
            ->map(function($company, $key){
                return $company->id;
              })

            ->toArray();


        return view(
          'user/edit',
          compact('user', 'userTypes', 'titles', 'countries', 'companies', 'userCompanyIds', 'identificationTypes')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        if (!Auth::check()) {

          return view('forbidden');
        
        } elseif (Auth::user()->hasAdminRights()) {

        } elseif (Auth::id() != $user->id) {

          return view('forbidden');

        }


        if (strlen($request->password) > 0) {
        
        $validator = Validator::make($request->all(), $user->rules(), $user->messages);

        if ($validator->fails()) {
          return redirect()->route('users.edit', $user->id)->withErrors($validator)->withInput();
        }

        $request->merge(['password' => Hash::make($request->password)]);

      } else {

        $request->offsetUnset('password');

      }


      $user->update($request->all());

      // updating companies linked to the user
      $companyIds = $request->input('company_id');

      $userCompanyIds = $user->companies
          
          ->map(function($company, $key){
              return $company->id;
            })

          ->toArray();


      if ($companyIds == NULL) {
        $companyIds = [];
      }


      // for each company selected in the form, creating a new record in users_companies
      // => ONLY IF THIS DOES NOT ALREADY EXIST!
      foreach ($companyIds as $companyId) {
        if(!in_array($companyId, $userCompanyIds)) {
          $usersCompany = new UsersCompany;
          $usersCompany->user_id = $user->id;
          $usersCompany->company_id = $companyId;
          $usersCompany->save();
        }
      }


      // deleting records of companies unselected
      foreach ($userCompanyIds as $userCompanyId) {
        if(!in_array($userCompanyId, $companyIds)) {
          $usersCompanies = UsersCompany::where('user_id', $user->id)->where('company_id', $userCompanyId)->get();

          foreach ($usersCompanies as $usersCompany) {
            $usersCompany->delete();
          }
        }
      }


      // if user has admin rights and is not editing him/herself
      return Auth::check() && Auth::user()->hasAdminRights() && Auth::id() != $user->id ?
          redirect()->route('users.index')->with('success','Successfully updated!') :
          redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return "ok";
    }
}
