@extends('layout.cdn')
@if(session('success'))
        <div class="alert css alert-success">
        {{session('success')}}
        </div>
        @endif
            </div>
          </div>
          @if(session('error'))
        <div id="alert alert-success">
        {{session('error')}}
        </div>
        @endif
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">
        {{$error}}
        </div>
      
        @endforeach

    <div class="container">
    <a href="{{ URL::to('logout/content')}}" class="logout text-white float-right"> Logout</a>
        <div class="Dashbaord">
        <?php 
            
            print_r($user->nickname);
        
         ?>
        </div>
    </div>

