@extends('layout.cdn')
<div class="container mt-5">

<a href="{{ URL::to('logout')}}" class="ffff text-white float-right"> Logout</a>
  @if(session('success'))
        <div class="alert alert-success" id="success">
        {{session('success')}}
        </div>
        @endif
            </div>
          </div>
          @if(session('error'))
        <div class="alert alert-danger" id="error">
        {{session('error')}}
        </div>
        @endif
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">
        {{$error}}
        </div>
        @endforeach
  {!!Form::open(['action' => 'admin@addSubCategory', 'method' => 'post', 'files'=>true])!!}
          {{Form::token()}}
      <div class="container profile">
        <h1>Add Category</h1>
          <div class="row align-items-center">
            <div class="col-md-6 mt-5 ">
                {{Form::label('Sub-Category', 'Sub-Category-Name')}} 
                 {{Form::text('subcategory', '',['class'=>'form-control','placeholder'=>'Add Category'])}}

                 <input type="hidden" name="catid" value="{{$catId}}">
            </div>
            {{ Form::submit('Submit!',['class'=>'btn btn-primary']) }}
     </div>
  {{ Form::close() }}
  </div>
</div>

<table>
  <tr>
    <th>Sr. No</th>
    <th>Subcategory Name</th>
  </tr>
  @foreach($subcategory as $index=>$sub)
  <tr>
    <td>{{$index+1}}</td>
    <td>{{$sub->subcategory}}</td>
  </tr>
  @endforeach
  
</table>