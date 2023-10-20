@extends('admin.layouts.app')
@section('title','Profile')
@section('bread-title','Profile')
@section('bread-current-title','Edit Profile')

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
              <form action="{{ route('admin#profile#update', $profile->id) }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="card-body pb-0">
                <h5>Create Profile</h5>
                
                
              </div>
              <div class="card-body border-top">
                
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="mb-3">
                      <label for="profile_name" class="control-label col-form-label">Name</label>
                      <input type="text" name="profile_name" class="form-control @error('profile_name') is-invalid @enderror border border-primary" id="profile_name" value="{{ old('profile_name',$profile->name) }}" placeholder="Name Here">
                          @error('profile_name')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="mb-3">
                      <label for="profile_position" class="control-label col-form-label">Position</label>
                      <input type="text" name="profile_position" class="form-control @error('profile_position') is-invalid @enderror border border-primary" id="profile_position" value="{{ old('profile_position',$profile->position) }}" placeholder="Position Here">
                          @error('profile_position')
                              <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                    </div>
                  </div>
                  
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="mb-3">
                          <label for="editor1" class="control-label col-form-label">Bio</label>
                          <textarea cols="50" class="form-control @error('profile_bio') is-invalid @enderror border border-primary" id="editor1" name="profile_bio" rows="3" placeholder="Bio Here">{{ old('profile_bio',$profile->bio) }}
                            </textarea>
                            @error('profile_bio')
                              <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                      </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="mb-3">
                          <label for="editor-ambition" class="control-label col-form-label">My Ambition</label>
                          <textarea cols="50" class="form-control @error('editor_ambition') is-invalid @enderror border border-primary" id="editor-ambition" name="editor_ambition" rows="3" placeholder="My Ambition Here">{{ old('editor_ambition', $profile->ambition) }}
                            </textarea>
                            @error('editor_ambition')
                              <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-form-label">Ambition Icon</div>
                        <div class="image-wrap">
                          <div class="image-container ambition_img">
                              <i class="fa fa-user"></i>
                              @if($profile->ambition_icon)
                              <img src="{{ asset('storage/'.$profile->ambition_icon) }}" alt="" srcset="">
                              @else
                              <img src="{{ asset('admin/dist/images/profile/add-image.png') }}" alt="" srcset="">
                              @endif
                              
                          </div>
                          <label for="ambition_icon" class="camera-icon">
                              <i class="fa fa-camera"></i>
                          </label>
                          <input type="file" class="form-control @error('ambition_icon') is-invalid @enderror" name="ambition_icon" id="ambition_icon" accept="image/*" hidden >
                          @error('ambition_icon')
                              <small class="invalid-feedback">{{ $message }}</small>
                          @enderror
                      </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="mb-3">
                          <label for="editor-purpose" class="control-label col-form-label">My Purpose</label>
                          <textarea cols="50" class="form-control @error('editor_purpose') is-invalid @enderror border border-primary" id="editor-purpose" name="editor_purpose" rows="3" placeholder="My Purpose Here">{{ old('editor_purpose', $profile->purpose) }}
                            </textarea>
                            @error('editor_purpose')
                              <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-form-label">Purpose Icon</div>
                        <div class="image-wrap">
                          <div class="image-container purpose_img">
                              <i class="fa fa-user"></i>
                              
                              <img src="{{ asset('admin/dist/images/profile/add-image.png') }}" alt="" srcset="">
                          </div>
                          <label for="purpose_icon" class="camera-icon">
                              <i class="fa fa-camera"></i>
                          </label>
                          <input type="file" class="form-control @error('purpose_icon') is-invalid @enderror" name="purpose_icon" id="purpose_icon" accept="image/*" hidden >
                          @error('purpose_icon')
                              <small class="invalid-feedback">{{ $message }}</small>
                          @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                      <div class="col-form-label">Feature Image 1</div>
                      <div class="image-wrap">
                        <div class="image-container feature_img_1">
                            <i class="fa fa-user"></i>
                            
                            <img src="{{ asset('admin/dist/images/profile/add-image.png') }}" alt="" srcset="">
                        </div>
                        <label for="feature_image_1" class="camera-icon">
                            <i class="fa fa-camera"></i>
                        </label>
                        <input type="file" class="form-control @error('feature_image_1') is-invalid @enderror" name="feature_image_1" id="feature_image_1" accept="image/*" hidden >
                        @error('feature_image_1')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="col-form-label">Feature Image 2</div>
                      <div class="image-wrap">
                        <div class="image-container feature_img_2">
                            <i class="fa fa-user"></i>
                            
                            <img src="{{ asset('admin/dist/images/profile/add-image.png') }}" alt="" srcset="">
                        </div>
                        <label for="feature_image_2" class="camera-icon">
                            <i class="fa fa-camera"></i>
                        </label>
                        <input type="file" class="form-control @error('feature_image_2') is-invalid @enderror" name="feature_image_2" id="feature_image_2" accept="image/*" hidden >
                        @error('feature_image_2')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                </div>

                
            
              </div>
              
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

        var editor1 = CKEDITOR.replace("editor1", {
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

      var editorambition = CKEDITOR.replace("editor-ambition", {
        extraAllowedContent: "div",
        height: 250,
      });

      var editorpurpose = CKEDITOR.replace("editor-purpose", {
        extraAllowedContent: "div",
        height: 250,
      });

      var ambition_icon = document.querySelector("#ambition_icon");
        ambition_icon.onchange = function(e){
            if(e.target.files.length>0){
                var src=URL.createObjectURL(e.target.files[0]);
                var image = document.querySelector(".ambition_img img");
                image.src= src;
            }
        }

        var purpose_icon = document.querySelector("#purpose_icon");
        purpose_icon.onchange = function(e){
            if(e.target.files.length>0){
                var src=URL.createObjectURL(e.target.files[0]);
                var image = document.querySelector(".purpose_img img");
                image.src= src;
            }
        }

        var feature_image_1 = document.querySelector("#feature_image_1");
        feature_image_1.onchange = function(e){
            if(e.target.files.length>0){
                var src=URL.createObjectURL(e.target.files[0]);
                var image = document.querySelector(".feature_img_1 img");
                image.src= src;
            }
        }

        var feature_image_2 = document.querySelector("#feature_image_2");
        feature_image_2.onchange = function(e){
            if(e.target.files.length>0){
                var src=URL.createObjectURL(e.target.files[0]);
                var image = document.querySelector(".feature_img_2 img");
                image.src= src;
            }
        }
    </script>

<script>
    

  </script>

@endsection
