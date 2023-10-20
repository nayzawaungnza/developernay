<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::get();
        return view('admin.profiles.index',compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $profileData = $this->getProfileData($request);
        if ($request->hasFile('ambition_icon')):

            $ambitionImage = $request->file('ambition_icon');
            // Get the original file name
            $ambitionName = uniqid().'-'.$ambitionImage->getClientOriginalName();
            $ambitionImage->StoreAs($ambitionName);

            $profileData['ambition_icon'] = $ambitionName;
        endif;

        if ($request->hasFile('purpose_icon')):
            $purposeImage = $request->file('purpose_icon');
            // Get the original file name
            $purposeName = uniqid().'-'.$purposeImage->getClientOriginalName();
            $purposeImage->StoreAs($purposeName);

            $profileData['purpose_icon'] = $purposeName;
        endif;

        if ($request->hasFile('feature_image_1')):
            $feature_1_Image = $request->file('feature_image_1');
            // Get the original file name
            $feature_1_Name = uniqid().'-'.$feature_1_Image->getClientOriginalName();
            $feature_1_Image->StoreAs($feature_1_Name);

            $profileData['image_1'] = $feature_1_Name;
        endif;

        if ($request->hasFile('feature_image_2')):
            $feature_2_Image = $request->file('feature_image_2');
            // Get the original file name
            $feature_2_Name = uniqid().'-'.$feature_2_Image->getClientOriginalName();
            $feature_2_Image->StoreAs($feature_2_Name);

            $profileData['image_2'] = $feature_2_Name;
        endif;

        //dd($profileData);

        Profile::create($profileData);
        return redirect()->route('admin#profiledata')->with(['success'=>'Create Profile Success']);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = Profile::FindorFail($id);
        return view('admin.profiles.edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function getProfileData($request){
        Validator::make($request->all(),  [
            'profile_name' => ['required', 'string', 'max:255'],
            'profile_position' => ['required', 'string'],
            'profile_bio' => ['required'],
            'editor_ambition' => ['required'],
            'editor_purpose' => ['required'],
            'ambition_icon' => ['mimes:jpeg,png,gif,jpg,webp,svg','required','image','max:2048'],
            'purpose_icon' => ['mimes:jpeg,png,gif,jpg,webp,svg','required','image','max:2048'],
            'feature_image_1' => ['mimes:jpeg,png,gif,jpg,webp,svg','required','image','max:2048'],
            'feature_image_2' => ['mimes:jpeg,png,gif,jpg,webp,svg','required','image','max:2048'],
        ])->validate();

        return [
            'name' => $request->profile_name,
            'position' => $request->profile_position,
            'bio' => $request->profile_bio,
            'ambition' => $request->editor_ambition,
            //'ambition_icon', 
            'purpose' => $request->editor_purpose,
            //'purpose_icon', 
            //'image_1',
            //'image_2',
            //'slug' => Str::slug($request->pizzaName),
            
        ];
    }
}
