<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::get();
        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $service = $this->getServiceData($request);
        if ($request->hasFile('service_image')):

            $serviceImage = $request->file('service_image');
            // Get the original file name
            $serviceName = uniqid().'-'.$serviceImage->getClientOriginalName();
            //$serviceImage->StoreAs('public',$serviceName);
            Storage::disk('public')->put('services/'.$serviceName, file_get_contents($serviceImage));

            $service['image'] = $serviceName;
        endif;
        //dd($service);
        Service::create($service);
        return redirect()->route('admin#service#index')->with(['success'=>'Create Service Success']);
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
        $service = Service::FindorFail($id);
        return view('admin.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dbService = Service::find($id);
        $service = $this->getUpdateServiceData($request);

        if ( $dbService->image != null):
            if($request->hasFile('service_image') ):
                Storage::delete('public/'.$dbService->image);
                $serviceImage = $request->file('service_image');
                // Get the original file name
                $serviceName = uniqid().'-'.$serviceImage->getClientOriginalName();
                //$serviceImage->StoreAs('public',$serviceName);
                Storage::disk('public')->put('services/'.$serviceName, file_get_contents($serviceImage));

                $service['image'] = $serviceName;
            else:
                $service['image'] = $dbService->image;
            endif;
        endif;

       // dd($service);

        Service::where('id',$id)->update($service);
        return redirect()->route('admin#service#index')->with(['success'=>'Service has been updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);
        if ($service->image != null):
            Storage::delete('public/services/'.$service->image);
        endif;
        Service::where('id',$id)->delete();
        return back()->with(['success'=>'Service has been deleted.']);
    }

    private function getServiceData($request){
        Validator::make($request->all(),  [
            'service_title' => ['required', 'string', 'max:255'],
            'service_content' => ['required', 'string'],
            'service_image' => ['mimes:jpeg,png,gif,jpg,webp,svg','required','image','max:2048'],
        ])->validate();

        return [
            'title' => $request->service_title,
            'content' => $request->service_content,
        ];
    }

    private function getUpdateServiceData($request){
        Validator::make($request->all(),  [
            'service_title' => ['required', 'string', 'max:255'],
            'service_content' => ['required', 'string'],
            'publish_status' => ['required'],
            //'service_image' => ['mimes:jpeg,png,gif,jpg,webp,svg','required','image','max:2048'],
        ])->validate();

        return [
            'title' => $request->service_title,
            'content' => $request->service_content,
            'status' => $request->publish_status,
        ];
    }
}
