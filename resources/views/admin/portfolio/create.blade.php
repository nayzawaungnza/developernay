@extends('admin.layouts.app')
@section('title','Service')
@section('bread-title','Service')
@section('bread-current-title','Add New')

@section('ckeditor')
<link rel="stylesheet" href="{{ asset('admin/dist/libs/dropzone/dist/min/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/dist/libs/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}">
<link rel="stylesheet" href="{{ asset('admin/dist/libs/ckeditor/samples/css/samples.css') }}">
@endsection
@section('content')
<!-- MAIN CONTENT-->
<section>
    <div class="row">
        <div class="col-lg-12 col-md-12 d-flex align-items-stretch">
            <!-- ---------------------
                                start Employee Profile
                            ---------------- -->

            <div class="card w-100">
              <form action="{{ route('admin#service#store') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="card-body pb-0">
                <h5>Create Service</h5>
                
                
              </div>
              <div class="card-body border-top">
                
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <div class="mb-3">
                      <label for="service_title" class="control-label col-form-label">Title</label>
                      <input type="text" name="service_title" class="form-control @error('service_title') is-invalid @else border border-primary @enderror " id="service_title" value="{{ old('service_title') }}" placeholder="Title Here">
                          @error('service_title')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                  </div>
                  
                </div>
                
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="mb-3">
                          <label for="service_content" class="control-label col-form-label">Content</label>
                          <textarea cols="50" class="form-control @error('service_content') is-invalid @else border border-primary  @enderror" id="service_content" name="service_content" rows="3" placeholder="My Ambition Here">{{ old('service_content') }}
                            </textarea>
                            @error('service_content')
                              <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-form-label">Feature Image</div>
                        <div class="image-wrap">
                          <div class="image-container service_img">
                              <i class="fa fa-user"></i>
                              
                              <img src="{{ asset('admin/dist/images/profile/add-image.png') }}" alt="" srcset="">
                          </div>
                          <label for="service_image" class="camera-icon">
                              <i class="fa fa-camera"></i>
                          </label>
                          <input type="file" class="form-control @error('service_image') is-invalid @enderror" name="service_image" id="service_image" accept="image/*" hidden >
                          @error('service_image')
                              <small class="invalid-feedback">{{ $message }}</small>
                          @enderror
                      </div>

                    </div>
                </div>
                
              </div>{{-- card body --}}
              
              <div class="p-3 border-top">
                <div class="action-form">
                  <div class="mb-3 mb-0 text-start">
                    <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">
                      Save
                    </button>
                    {{-- <button type="submit" class="btn btn-dark rounded-pill px-4 waves-effect waves-light">
                      Cancel
                    </button> --}}
                  </div>
                </div>
              </div>
            </form>
            </div>
            <!-- ---------------------
                                end Employee Profile
                            ---------------- -->
          </div>
    </div>
</section>
@endsection
@section('ckeditorscript')
<script src="{{ asset('admin/dist/libs/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin/dist/libs/ckeditor/samples/js/sample.js') }}"></script>
@endsection
@section('script')
    <script>
        //Dropzone.discover();
        initSample();

        var editor1 = CKEDITOR.replace("service_content", {
        extraAllowedContent: "div",
        height: 300,
      });
      editor1.on("instanceReady", function () {
        // Output self-closing tags the HTML4 way, like <br>.
        this.dataProcessor.writer.selfClosingEnd = ">";

        // Use line breaks for block elements, tables, and lists.
        var dtd = CKEDITOR.dtd;
        for (var e in CKEDITOR.tools.extend(
          {},
          dtd.$nonBodyContent,
          dtd.$block,
          dtd.$listItem,
          dtd.$tableContent
        )) {
          this.dataProcessor.writer.setRules(e, {
            indent: true,
            breakBeforeOpen: true,
            breakAfterOpen: true,
            breakBeforeClose: true,
            breakAfterClose: true,
          });
        }
        // Start in source mode.
        //this.setMode("source");
      });

      

      var service_image = document.querySelector("#service_image");
        service_image.onchange = function(e){
            if(e.target.files.length>0){
                var src=URL.createObjectURL(e.target.files[0]);
                var image = document.querySelector(".service_img img");
                image.src= src;
            }
        }

        
    </script>



@endsection
