<!-- resources/views/contacts/show.blade.php -->


@extends('contacts.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Contacts</h2>
            </div>
            <div class="pull-right">
                <a class="btn-novo-other  shape" href="{{ route('contacts.index') }}"> Back</a>
            </div><br><br>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $contact->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $contact->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contacts:</strong>
                {{ $contact->contact }}
            </div>
        </div>
    </div>
@endsection
