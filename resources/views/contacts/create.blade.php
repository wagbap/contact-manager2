@extends('auth.layouts')
 

@section('content')

<div class="container">

	<div id="contentWrapper">

		<div class="pageContent">
        <div class="col-lg-12 margin-tb">
  

		<div class="page-title title-1">			                  
                  
        <div class="pull-right">
            <a class="btn-novo-other shape" href="{{ route('contacts.index') }}"> Back</a>
        </div><br>
				
			<h1>Contactos</h1><h2>Entre em contacto connosco</h2>
				</div>
			</div>
		</div>
		
			
	<div class="section contactsDiv">
		<div class="container">
			<div class="conact_center_form shape lg new-angle">
				<div class="heading centered">
					<i class="fa fa-envelope tbl main-color icon-blue icon-small"></i>
					<h2 class="head-4 bold title-near-icon" style="text-transform: uppercase;">Contacte-nos</h2>
					<hr class="underline">
				</div>
				
				
				<div class="center_contact" id="contact">
					
				<form action="{{ route('contacts.store') }}" method="POST">

                @csrf
							<div class="text-box shape">
								<input type="text" class="form-control-novo shape new-angle error large-textbox" required="required" name="name" id="name" value="{{ old('name') }}" placeholder="Your Name" >
                                <div style="color:red" > {{  $errors->first('name') }} </div>
							</div>

							<div class="form-input text-box shape">
								<input type="email" class="form-control-novo shape new-angle error large-textbox" required="required" name="email" id="email" value="{{ old('email') }}" placeholder="Your Email" >
                                <div style="color:red" > {{  $errors->first('email') }} </div>
							</div>

							<div class="form-input text-box shape">
								<input type="text" class="form-control-novo shape new-angle error large-textbox" required="required" name="contact" id="contact" value="{{ old('contact') }}" placeholder="Your Contact" >
                                <div style="color:red" > {{  $errors->first('contact') }} </div>
							</div>
													
													
							<button class="btn-novo shape">Enviar Mensagem</button>
						
					</form>
				</div>
			</div>
		</div>
	</div>
	
	

	</div>

	</div>
</div>
</div> 

   
</form>
@endsection

