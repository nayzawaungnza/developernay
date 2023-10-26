<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
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
            $ambitionImage->StoreAs('public',$ambitionName);
            //Storage::disk('public')->put('public/'.$ambitionName, file_get_contents($ambitionImage));

            $profileData['ambition_icon'] = $ambitionName;
        endif;

        if ($request->hasFile('purpose_icon')):
            $purposeImage = $request->file('purpose_icon');
            // Get the original file name
            $purposeName = uniqid().'-'.$purposeImage->getClientOriginalName();
            $purposeImage->StoreAs('public',$purposeName);
            //Storage::disk('public')->put('public/'.$purposeName, file_get_contents($purposeImage));

            $profileData['purpose_icon'] = $purposeName;
        endif;

        if ($request->hasFile('feature_image_1')):
            $feature_1_Image = $request->file('feature_image_1');
            // Get the original file name
            $feature_1_Name = uniqid().'-'.$feature_1_Image->getClientOriginalName();
            $feature_1_Image->StoreAs('public',$feature_1_Name);
            //Storage::disk('public')->put('public/'.$feature_1_Name, file_get_contents($feature_1_Image));

            $profileData['image_1'] = $feature_1_Name;
        endif;

        if ($request->hasFile('feature_image_2')):
            $feature_2_Image = $request->file('feature_image_2');
            // Get the original file name
            $feature_2_Name = uniqid().'-'.$feature_2_Image->getClientOriginalName();
            $feature_2_Image->StoreAs('public',$feature_2_Name);
            //Storage::disk('public')->put('public/'.$feature_2_Name, file_get_contents($feature_2_Image));

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

        $dbProfileData = Profile::find($id);

        $updateProfileData = $this->getUpdateProfileData($request);
        if($request->active == 'on'):
            $updateProfileData['is_active'] = 1;
        else:
            $updateProfileData['is_active'] = 0;
        endif;
        //dd($updateProfileData);

        if ( $dbProfileData->ambition_icon != null):
            if($request->hasFile('ambition_icon') ):
                Storage::delete('public/'.$dbProfileData->ambition_icon);
                $ambitionImage = $request->file('ambition_icon');
                // Get the original file name
                $ambitionName = uniqid().'-'.$ambitionImage->getClientOriginalName();
                $ambitionImage->StoreAs('public',$ambitionName);
                //Storage::disk('public')->put('public/'.$ambitionName, file_get_contents($ambitionImage));

                $updateProfileData['ambition_icon'] = $ambitionName;
            else:
                $updateProfileData['ambition_icon'] = $dbProfileData->ambition_icon;
            endif;
        endif;

        if ($dbProfileData->purpose_icon != null):
            if ($request->hasFile('purpose_icon')):
                Storage::delete('public/'.$dbProfileData->purpose_icon);
                $purposeImage = $request->file('purpose_icon');
                // Get the original file name
                $purposeName = uniqid().'-'.$purposeImage->getClientOriginalName();
                $purposeImage->StoreAs('public',$purposeName);
                //Storage::disk('public')->put('public/'.$purposeName, file_get_contents($purposeImage));

                $updateProfileData['purpose_icon'] = $purposeName;
            else:
                $updateProfileData['purpose_icon'] = $dbProfileData->purpose_icon;
            endif;
            
        endif;

        if ($dbProfileData->image_1 != null):
            if ($request->hasFile('feature_image_1')):
                Storage::delete('public/'.$dbProfileData->image_1);
                $feature_1_Image = $request->file('feature_image_1');
                // Get the original file name
                $feature_1_Name = uniqid().'-'.$feature_1_Image->getClientOriginalName();
                $feature_1_Image->StoreAs('public',$feature_1_Name);
                //Storage::disk('public')->put('public/'.$feature_1_Name, file_get_contents($feature_1_Image));

                $updateProfileData['image_1'] = $feature_1_Name;
            else:
                $updateProfileData['image_1'] = $dbProfileData->image_1;
            endif;
            
        endif;

        if ($dbProfileData->image_2 != null):
            if ($request->hasFile('feature_image_2')):
                Storage::delete('public/'.$dbProfileData->image_2);
                $feature_2_Image = $request->file('feature_image_2');
                // Get the original file name
                $feature_2_Name = uniqid().'-'.$feature_2_Image->getClientOriginalName();
                $feature_2_Image->StoreAs('public',$feature_2_Name);
                //Storage::disk('public')->put('public/'.$feature_2_Name, file_get_contents($feature_2_Image));

                $updateProfileData['image_2'] = $feature_2_Name;
            else:
                $updateProfileData['image_2'] = $dbProfileData->image_2;
            endif;
            
        endif;
        // $updateProfileData['status'] = $dbProfileData->status;
        // $updateProfileData['is_active'] = $dbProfileData->is_active;

        //dump($dbProfileData);
        //dd($updateProfileData);

        if ($updateProfileData['is_active']) {
            // If  update profile data is set as active, deactivate all other data profiles
            Profile::where('id', '!=', $id)->update(['is_active' => false]);
        }

        Profile::where('id',$id)->update($updateProfileData);

       return redirect()->route('admin#profiledata')->with(['success'=>'Your Profile Data has been updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dbProfileData = Profile::find($id);
        if ( $dbProfileData->ambition_icon != null):
                Storage::delete('public/'.$dbProfileData->ambition_icon);
        endif;

        if ($dbProfileData->purpose_icon != null):
                Storage::delete('public/'.$dbProfileData->purpose_icon);
        endif;

        if ($dbProfileData->image_1 != null):
                Storage::delete('public/'.$dbProfileData->image_1);
        endif;

        if ($dbProfileData->image_2 != null):
                Storage::delete('public/'.$dbProfileData->image_2);
        endif;
        Profile::where('id',$id)->delete();
        return back()->with(['success'=>'Your Profile Data has been deleted.']);
    }

    private function getProfileData($request){
        Validator::make($request->all(),  [
            'profile_name' => ['required', 'string', 'max:255'],
            'profile_position' => ['required', 'string'],
            'heading' => ['required', 'string'],
            'headline' => ['required', 'string'],
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
            'heading' => $request->heading,
            'headline' => $request->headline,
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

    private function getUpdateProfileData($request){
        Validator::make($request->all(),  [
            //'profile_name' => ['required', 'string', 'max:255', Rule::unique('profiles', 'profile_name')->ignore($request->id)],
            'profile_name' => ['required', 'string', 'max:255'],
            'profile_position' => ['required', 'string'],
            'heading' => ['required', 'string'],
            'headline' => ['required', 'string'],
            'profile_bio' => ['required'],
            'editor_ambition' => ['required'],
            'editor_purpose' => ['required'],
            'publish' => ['required'],
            //'ambition_icon' => ['mimes:jpeg,png,gif,jpg,webp,svg','required','image','max:2048'],
            //'purpose_icon' => ['mimes:jpeg,png,gif,jpg,webp,svg','required','image','max:2048'],
            //'feature_image_1' => ['mimes:jpeg,png,gif,jpg,webp,svg','required','image','max:2048'],
            //'feature_image_2' => ['mimes:jpeg,png,gif,jpg,webp,svg','required','image','max:2048'],
        ])->validate();

        return [
            'name' => $request->profile_name,
            'position' => $request->profile_position,
            'heading' => $request->heading,
            'headline' => $request->headline,
            'bio' => $request->profile_bio,
            'ambition' => $request->editor_ambition,
            //'ambition_icon', 
            'purpose' => $request->editor_purpose,
            //'is_active' => $request->active,
            'status' => $request->publish,
            //'purpose_icon', 
            //'image_1',
            //'image_2',
            //'slug' => Str::slug($request->pizzaName),
            
        ];
    }
}
