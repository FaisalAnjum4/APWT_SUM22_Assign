
    <form method="post" action="">
    {{@csrf_field()}}
    Email: <input type="text" name="email" placeholder="Email" value="{{old('email')}}"><br>
    @error('email')
        {{$message}} <br>
    @enderror

    Password: <input type="password" name="password" ><br>
    @error('password')
        {{$message}}<br>
    @enderror
  
    <input type="submit" value="login">
</form>
