@extends('admin.layouts.app')
@section('title','Portfolio')
@section('bread-title','Portfolio')
@section('bread-current-title','Portfolio List')
@section('ckeditor')

<link rel="stylesheet" href="{{ asset('admin/dist/libs/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css') }}">
@endsection
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
    <a href="{{ route('admin#portfolio#create') }}" id="add-list" class="btn btn-primary">Add New Service</a>
</div>
@if ($portfolios->isNotEmpty())
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
        <th>Title</th>
        <th>Content</th>
        <th>Status</th>
        <th>Feature Image</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($portfolios as $portfolio)
      <tr>
        <td>1</td>
        <td>
          <a href="javascript:void(0)" class="link"
            >
            {{ $portfolio->title }}</a
          >
        </td>
        <td>{!! $portfolio->excerpt($portfolio->content) !!}</td>
        
        <td>
          @if ($portfolio->status)
          <span class="mb-1 badge rounded-pill bg-success">Publish</span>
          @else
          <span class="mb-1 badge rounded-pill bg-danger">unpublish</span>
          @endif
        </td>
        <td>
            <img src="{{ asset('storage/portfolios/' .$portfolio->image) }}" alt="Portfolio Feature Image" width="40" class="rounded-circle" />
        </td>
        <td>
            {{ $portfolio->created_at }} - {{ $portfolio->updated_at }}
        </td>
        
        <td>
          <a href="{{ route('admin#portfolio#edit', $portfolio->id) }}" class="justify-content-center  btn mb-1 btn-warning d-flex align-items-center"><i class="ti ti-edit"></i></a>
          <a href="#" class="justify-content-center  btn mb-1 btn-success d-flex align-items-center"><i class="ti ti-eye"></i></a>
          <a href="{{ route('admin#portfolio#destroy', $portfolio->id) }}" class="justify-content-center  btn mb-1 btn-danger d-flex align-items-center"><i class="ti ti-trash"></i></a>
        </td>
      </tr>
      @endforeach
      
      
      
      
      
      
      
      
    </tbody>
  </table>
</div>
@else

<div class="alert bg-light-danger text-info fade show" role="alert">
  <div class="d-flex align-items-center text-danger font-medium">
    <i class="ti ti-info-circle me-2 fs-4"></i>
    Have not Portfolios!
  </div>
</div>
  
@endif



@endsection
@section('ckeditorscript')



@endsection