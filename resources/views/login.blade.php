@include('header')
<div style="color:white;background:black;padding:8px;text-align:center">
    <h1>EUROMEGA LM </h1>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            @if(session()->has('failemail'))
                <script>
                    swal("Error", "Email does not exist !!", "error");
                </script>
            @endif
            @if(session()->has('failpass'))
                <script>
                    swal("Error", "Wrong Authentication !!", "error");
                </script>
            @endif
            <form method="post" action="/login" style="border:1px solid #ccc; padding:20px;">
                @csrf
                <center>
                    <i class="fas fa-circle-user" style="font-size:80px;"></i>
                </center>
                <br>
                <div class="mb-4">
                    <label for="email"> <i class="fas fa-user"></i> Email</label>
                    <input class="form-control form-control-lg" name="email" type="text">
                    @error('email')
                        <i style="color:red">{{$message}}</i>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password"> <i class="fas fa-lock"></i> Password</label>
                    <input class="form-control form-control-lg" name="password" type="password">
                    @error('password')
                        <i style="color:red">{{$message}}</i>
                    @enderror
                </div>
                <div class="mb-4">
                    <button class="btn btn-lg btn-success">
                       Login <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
                <a href="/register">Register here if not registered yet</a>
            </form>
            

        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
@include('footer')