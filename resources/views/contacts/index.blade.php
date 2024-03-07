@extends('auth.layouts')

@section('content')


<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-left">
                <h1>Laravel 10 Contact Management Web application supported by alfasoft.pt</h1>
     </div>
           
            <div class="pull-right">
                <a class="btn-novo-other shape" href="{{ route('contacts.create') }}"> Create New Contact</a>
            </div><br>
    </div>
</div>

   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->contact }}</td>
            <td>
                <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('contacts.show',$contact->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}">Edit</a>
    
                    @csrf
                    @method('DELETE')
      
                    <!-- Botão de exclusão com modal de confirmação -->
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete{{$contact->id}}">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        

@endforeach

    </table>
  
    {!! $contacts->links() !!}
      
@endsection
