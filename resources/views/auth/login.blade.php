<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <main>

        <section>
            <div class="container my-4">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h5>Login</h5>
                                @if (session()->has('error'))
                                    <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                                @endif
                            </div>
                            <div class="card-body">
                                <form action="{{ route('login-check.login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="my-input">Email</label>
                                        <input id="my-input" class="form-control" type="email" name="email"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Password</label>
                                        <input id="my-input" class="form-control" type="text" name="password">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
