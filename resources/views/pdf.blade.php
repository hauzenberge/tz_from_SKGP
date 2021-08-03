@extends('layouts.app')

@section('content')
<div class="row">      
    @foreach($pages as $page)
        <div class="col-12 col-md-4"> 
            <div class="card">
                <div class="card-header">
                    <h5>{{$page->name}}</h5>
                </div>
                 <div class="card-body">                        
                        <div class="barcode">
                            {!! $page->barcode!!}
                        </div>                        
                 </div>
            </div>
        </div>
    @endforeach     
</div>
@endsection
