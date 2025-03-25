
@extends('layout.layout')

@section('styles')
<style>
    * {box-sizing: border-box}

    .form-box{
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        height:97vh;
    }

    /* Add padding to containers */
    .container {
    padding: 16px;
    width: 35%;
    margin-inline: auto;
    }

    /* Full-width input fields */
    input[type=text], input[type=password] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 15px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
    }

    /* Set a style for the submit/register button */
    .registerbtn {
    background-color: #04AA6D;
    color: white;
    padding: 10px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    }

    .registerbtn:hover {
    opacity:1;
    }

    a{
    color: dodgerblue;
    }
    .error{
        color:red;
    }

    .signin {
    background-color: #f1f1f1;
    text-align: center;
    }
</style>
@endsection

@section('content')
  <div style="position:absolute; right: 30px; top:30px" >
    @if(Session::has('error'))
          <p class="alert alert-danger" role="alert"  >{{ Session::get('error') }}</p>
        @endif
    </div>
    <div style="position:absolute; right: 30px; top:30px" >
    @if(Session::has('success'))
      <p class="alert alert-success" role="alert"  >{{ Session::get('success') }}</p>
    @endif
  </div>
  <x-Form action="{{route('auth.login-user')}}" method="POST" >

    <x-container>
      <h1 style="text-align:center" >Login</h1>
      <p style="text-align:center" >Please fill this form to Login into your account.</p>
      <hr>

      <x-input-field type="text" placeholder="Enter Email" name="email" id="email" label="Email" value="{{ old('email')}}" />
      <x-input-field type="password" placeholder="Enter Password" name="password" id="password" label="Password" value="{{ old('password')}}" />

      <x-primaryButton label="Login"/>
    </x-container>

    <x-container>
      <div class=" signin">
        <p>Dont have an account? <a  href="{{route('auth.register-page')}}" >Register</a>.</p>
      </div>
    </x-container>
    
  </x-Form>
@endsection