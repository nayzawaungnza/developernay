<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::get();
        return view('admin.portfolio.index',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $portfolio = $this->getPortfolioData($request);
        if ($request->hasFile('portfolio_image')):

            $portfolioImage = $request->file('portfolio_image');
            // Get the original file name
            $portfolioName = uniqid().'-'.$portfolioImage->getClientOriginalName();

           // Method 1: Using storeAs
            //$portfolioImage->storeAs('public', $portfolioName);

            // Method 2: Using Storage::disk
             Storage::disk('public')->put('portfolios/' . $portfolioName, file_get_contents($portfolioImage));

            $portfolio['image'] = $portfolioName;
        endif;
        
        //$portfolio['slug'] = $this->createSlug($request->portfolio_title);
        //dd($portfolio);
        Portfolio::create($portfolio);
        return redirect()->route('admin#portfolio#index')->with(['success'=>'Create Portfolio Success']);

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
        $portfolio = Portfolio::FindorFail($id);
        return view('admin.portfolio.edit',compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dbPortfolio = Portfolio::find($id);
        $portfolio = $this->getUpdatePortfolioData($request);
        $portfolio['slug'] = $this->updateUniqueSlug($request->portfolio_title, $dbPortfolio->slug);
        //dd($portfolio);
        if ( $dbPortfolio->image != null):
            if($request->hasFile('portfolio_image') ):
                Storage::delete('public/portfolios/'.$dbPortfolio->image);
                $portfolioImage = $request->file('portfolio_image');
                // Get the original file name
                $portfolioName = uniqid().'-'.$portfolioImage->getClientOriginalName();
                //$portfolioImage->StoreAs('public',$portfolioName);
                Storage::disk('public')->put('portfolios/'.$portfolioName, file_get_contents($portfolioImage));

                $portfolio['image'] = $portfolioName;
            else:
                $portfolio['image'] = $dbPortfolio->image;
            endif;
        endif;
        //dd($portfolio);
        Portfolio::where('id',$id)->update($portfolio);
        return redirect()->route('admin#portfolio#index')->with(['success'=>'Portfolio has been updated.']);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolio = Portfolio::find($id);
        if ($portfolio->image != null):
            Storage::delete('public/portfolios/'.$portfolio->image);
        endif;
        Portfolio::where('id',$id)->delete();
        return back()->with(['success'=>'Portfolio has been deleted.']);
    }

    private function getPortfolioData($request)
    {
        Validator::make($request->all(),[
            'portfolio_title' => 'required|string|max:255',
            'portfolio_website' => 'required|string|max:100',
            'portfolio_content' => 'required',
            'portfolio_image' => 'required|image|mimes:jpeg,png,gif,jpg,webp,svg|max:2048',
        ])->validate();
        return [
            'user_id' => auth()->id(),
            'title' => $request->portfolio_title,
            'slug' => $this->createSlug($request->portfolio_title),
            'website' => $request->portfolio_website,
            'content' => $request->portfolio_content,
        ];
    }

    private function getUpdatePortfolioData($request)
    {
        Validator::make($request->all(),[
            'portfolio_title' => 'required|string|max:255',
            'portfolio_website' => 'required|string|max:100',
            'portfolio_content' => 'required',
            //'portfolio_image' => 'required|image|mimes:jpeg,png,gif,jpg,webp,svg|max:2048',
        ])->validate();
        return [
            'user_id' => auth()->id(),
            'title' => $request->portfolio_title,
            //'slug' => $this->updateUniqueSlug($request->portfolio_title),
            'website' => $request->portfolio_website,
            'content' => $request->portfolio_content,
        ];
    }



    private function createSlug($title)
    {
        $slug = Str::slug($title);
        
        
//dd($currentSlug);
        if (Portfolio::where('slug', $slug)->exists()) {
            $max = Portfolio::whereTitle($title)->latest('id')->first();
            if ($max) {
                $parts = explode('-', $max->slug);
                $number = intval(end($parts));

                $slug = $slug . '-' . ($number + 1);
            } 
        }

        return $slug;
    }

    private function updateUniqueSlug($title, $currentSlug)
    {
        $newSlug = Str::slug($title);

        if ($newSlug !== $currentSlug) {
            if (Portfolio::where('slug', $newSlug)->exists()) {
                $max = Portfolio::whereTitle($title)->latest('id')->first();
                if ($max) {
                    $parts = explode('-', $max->slug);
                    $number = intval(end($parts));

                    $newSlug = $newSlug . '-' . ($number + 1);
                }
            }

            return $newSlug;
        }

        return $currentSlug;
    }



    
}
