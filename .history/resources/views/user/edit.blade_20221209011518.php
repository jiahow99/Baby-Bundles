<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Information</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('css/account-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/header-style.css')}}">
</head>

<body class="bg-image" style="background-image: url({{asset('img/baby-background.jpg')}});"> 

    <!-- Header -->
    <x-header.header></x-header.header>

    <section id="profile">
        <form class="container bg-light bg-opacity-50 pb-4" style="width:1000px" action="{{route('user.update', $user->id)}}">
            @csrf
            @method('PUT')
            
            <!-- image row -->
            <div class="row row-info justify-content-center py-4">
                <div class="col-3 pt-3 info mb-3 ">
                    <h3>Edit Profile</h3>
                </div>

            </div>
            <!-- info row -->
            <div class="row row-info">
                <div class="col-3 pt-3 info">
                </div>
                <div class="col">
                    <div class="row mt-3">
                        <!-- username -->
                        <div class="col-4">
                            <div class="form-group">
                                <label for="name" class="row">Username</label>
                                <input type="text" class="input row" name="name" value="{{$user->name}}">
                                @error('name')
                                    <p class="text-danger text-sm">{{message}}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- email -->
                        <div class="col-5 ms-5">
                            <div class="form-group">
                                <label for="name" class="row">Email</label>
                                <input type="text" class="input row" name="email" value="{{$user->email}}">
                                @error('email')
                                    <p class="text-danger text-sm">{{message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Contact and Gender -->
                    <div class="row mt-3">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="name" class="row">Contact No</label>
                                <input type="text" class="input row" name="contact" value="018-xxxxxxxx">
                                @error('contact')
                                    <p class="text-danger text-sm">{{message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-2 ms-5">
                            <div class="form-group">
                                <label for="name">Gender</label>
                                <select name="gender" class="form-select" required>
                                    <option value="null">select</option>
                                    <option value="male" @if ($user->gender == 'male')
                                        selected
                                    @endif>male</option>
                                    <option value="female"@if ($user->gender == 'female')
                                        selected
                                    @endif>female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Street -->
                    <div class="form-group my-3">
                        <label for="location">Location</label>
                        <textarea name="location" class="input row" id="location" rows="3" cols="60">{{$user->address->location}}</textarea>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <button type="submit" name="update" class="btn btn-primary">Save</button>
            </div>
        </form>
    </section>

    <!-- Footer -->
    <x-header.footer></x-header.footer>
</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="{{asset('js/navbar-transition.js')}}"></script>

</html>