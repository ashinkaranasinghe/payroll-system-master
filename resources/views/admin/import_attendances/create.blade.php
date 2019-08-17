@extends('layouts.app')

@section('content')
<div class="container">

        <div class="row">
            <div class="col-8 offset-2">
            <div><h1>Add Monthly Attendance</h1></div>
           <form action="/p" enctype="multipart/form-data" method ="get">
           @csrf
           <div class="form-group row">
                            <label for="caption" class="col-md-4 col-form-label ">Month</label>

                                <input id="date" type="date" 
                                class="form-control @error('caption') is-invalid @enderror"
                                name ="caption"
                                 
                                  value="{{ old('caption') }}"  
                                 autocomplete="caption" autofocus>

                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
                           
                           </div>
                           <div class="row">  <label for="caption" class="col-md-4 col-form-label ">Attendance File</label>
                        
                            <input type="file" class="form-control-file" id="image" name="image">
                            @error('image')
                                    
                                        <strong>{{ $message }}</strong>
                                   
                                @enderror
                           </div>
                           <div class="row pt-4">
                           <button class=" btn btn-primary">
                           Upload
                           </button>
                           </div>
                        </div>
                 </div>
           </form>
            
        </div>
</div>
@stop