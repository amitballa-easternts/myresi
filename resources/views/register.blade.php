<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="text-success text-center">Registration</h1>

            @if(Session::get('success'))
           
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong> {{Session::get('success')}}!</strong> 
            </div>           

            @endif
    </div>
        <div class="card-body">
            <form method="POST" action="/regist" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" 
                                class="form-control"
                                name="fname"
                                id="fname"
                                aria-describedby="helpId"
                                placeholder="Enter First Name" 
                                value="{{old('fname')}}"
                                require>
                            <span style="color:red;"> @error('fname'){{$message}}@enderror</span>
                           
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text"
                               class="form-control"  
                               name="lname" 
                               id="lname" 
                               aria-describedby="helpId" 
                               placeholder="Enter Last Name" 
                               value="{{old('lname')}}"
                               require>
                        <span style="color:red">@error('lname'){{$message}}@enderror</span>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label for="">Emailfs</label>
                        <input type="email" 
                                class="form-control"
                                name="email"
                                id="email"
                                aria-describedby="helpId"
                                placeholder="Enter Email" 
                                value="{{old('email')}}"
                                require>
                            <span style="color:red;"> @error('email'){{$message}}@enderror</span>
                           
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label for="">Password</label>
                        <input type="password"
                               class="form-control"  
                               name="password" 
                               id="password" 
                               aria-describedby="helpId" 
                               placeholder="Enter Password" 
                               value="{{old('password')}}"
                               require>
                        <span style="color:red">@error('password'){{$message}}@enderror</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label for="">File</label>
                        <input type="file"
                               class="form-control"  
                               name="file" 
                               id="file" 
                               
                               require>
                        <span style="color:red">@error('password'){{$message}}@enderror</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    <div class="col-sm-2">
                        <a href="login" class="btn btn-success">Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

