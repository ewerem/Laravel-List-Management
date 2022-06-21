@include('header')
<div style="color:white;background:black;padding:8px;text-align:center">
    <h1>LIST MANAGEMENT </h1>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            @if(session()->has('success'))
                <script>
                    swal("Good job!", "Registration Successful !!", "success");
                </script>
            @endif
            <form method="post" action="/addUser" enctype="multipart/form-data" style="border:1px solid #ccc; padding:20px;">
            @csrf
                <center>
                    <h4><i class="fas fa-user"></i> Register Here</h4>
                </center>
                <br>

                <div class="mb-4">
                    <label for="photo"> <i class="fas fa-picture"></i> Choose Photo</label>
                    <input class="form-control form-control-lg" name="photo" type="file" value="{{old('photo')}}">
                    @error('photo')
                        <i style="color:red">{{$message}}</i>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="fullname"> <i class="fas fa-pen"></i> Fullname</label>
                    <input class="form-control form-control-lg" name="fullname" type="text" value="{{old('fullname')}}">
                    @error('fullname')
                        <i style="color:red">{{$message}}</i>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="phone"> <i class="fas fa-pen"></i> Phone Number</label>
                    <input class="form-control form-control-lg" name="phone" type="number" value="{{old('phone')}}">
                    @error('phone')
                        <i style="color:red">{{$message}}</i>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email"> <i class="fas fa-pen"></i> Email</label>
                    <input class="form-control form-control-lg" name="email" type="text" value="{{old('email')}}">
                    @error('email')
                        <i style="color:red">{{$message}}</i>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password"> <i class="fas fa-lock"></i> Password</label>
                    <input class="form-control form-control-lg" name="password" type="password" value="{{old('password')}}">
                    @error('password')
                        <i style="color:red">{{$message}}</i>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation"> <i class="fas fa-lock"></i> Password</label>
                    <input class="form-control form-control-lg" name="password_confirmation" type="password" value="{{old('password_confirmation')}}">
                    @error('password_confirmation')
                        <i style="color:red">{{$message}}</i>
                    @enderror
                </div>

                <div class="mb-4">
                    <button class="btn btn-lg btn-success">
                       Submit Registration <i class="fas fa-check"></i>
                    </button>
                </div>
                <a href="/">Login here if registered </a>
            </form>  

        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
<br>
<br>
@include('footer')