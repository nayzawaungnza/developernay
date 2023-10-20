@extends('admin.layouts.app')
@section('title','Profile')
@section('bread-title','Profile')
@section('bread-current-title','Profile')
@section('content')
<!-- MAIN CONTENT-->
@if (session('success'))
<div class="alert bg-light-success text-info alert-dismissible fade show" role="alert">
    <div class="d-flex align-items-center text-success font-medium">
     <i class="ti ti-info-circle me-2 fs-4"></i>
      {{ session('success') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="action-btn layout-top-spacing mb-7 d-flex align-items-center justify-content-between">
    <h5 class="mb-0 fs-5 fw-semibold">Improving Work Processes</h5>
    <a href="{{ route('admin#profile#create') }}" id="add-list" class="btn btn-primary">Add New Profile</a>
</div>
@if ($profiles->isNotEmpty())
<div class="table-responsive">
  <table
    id="demo-foo-addrow"
    class="
      table table-bordered
      m-t-30
      table-hover
      contact-list
    "
    data-paging="true"
    data-paging-size="7"
  >
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Position</th>
        <th>Bio</th>
        <th>My Ambition</th>
        <th>My Purpose</th>
        <th>Feature Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($profiles as $profile)
      <tr>
        <td>1</td>
        <td>
          <a href="javascript:void(0)" class="link"
            >
            {{ $profile->name }}</a
          >
        </td>
        <td><span class="badge bg-info">{{ $profile->position }}</span></td>
        <td>{!! $profile->excerpt() !!}</td>
        <td>
            <img src="{{ asset('storage/'.$profile->ambition_icon) }}" alt="Ambition Icon" width="40" class="rounded-circle" />
            {!! $profile->ambition !!}
        </td>
        <td>
            {!! $profile->purpose !!}
        </td>
        <td>
          <img src="{{ url('storage/app/public/'.$profile->image_1) }}" alt="Image 1" width="40" class="rounded-circle" />
          <img src="{{ asset('storage/'.$profile->image_2) }}" alt="Image 2" width="40" class="rounded-circle" />
        </td>
        <td>
          <a href="{{ route('admin#profile#edit', $profile->id) }}" class="justify-content-center  btn mb-1 btn-warning d-flex align-items-center"><i class="ti ti-edit"></i></a>
          <a href="#" class="justify-content-center  btn mb-1 btn-success d-flex align-items-center"><i class="ti ti-eye"></i></a>
          <a href="#" class="justify-content-center  btn mb-1 btn-danger d-flex align-items-center"><i class="ti ti-trash"></i></a>
        </td>
      </tr>
      @endforeach
      
      
      
      
      
      
      
      
    </tbody>
  </table>
</div>
@else
  
@endif



@endsection
