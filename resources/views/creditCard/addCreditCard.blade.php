<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Insert Data</title>
</head>

<body>
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Credit Card</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('bank.index') }}">Bank <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('credit-card.index') }}">Credit Card</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Sign Out</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <div class="container my-3">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h5>Credit Card</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('credit-card.store') }}" method="POST">
                                @csrf
                                @if (session()->has('error'))
                                    <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="cc_type">Credit Card Type</label>
                                    <input type="text" name="cc_type" class="form-control"
                                        value="{{ old('cc_type') }}" placeholder="Enter Credit Card Type">
                                    @error('cc_type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="cc_number">Credit Card Number</label>
                                    <input type="number" name="cc_number" class="form-control"
                                        value="{{ old('cc_number') }}" placeholder="Enter cc_number">
                                    @error('cc_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="cc_exp_month">Credit Card Expiry Month</label>
                                    <input type="date" name="cc_exp_month" class="form-control"
                                        value="{{ old('cc_exp_month') }}" placeholder="Enter cc_exp_month">
                                    @error('cc_exp_month')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="cc_exp_year">Credit Card Expiry Year</label>
                                    <input type="date" name="cc_exp_year" class="form-control"
                                        value="{{ old('cc_exp_year') }}" placeholder="Enter cc_exp_year">
                                    @error('cc_exp_year')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="bank_id">Bank Name</label>
                                    <select class="form-control" name="bank_id">
                                        <option value="">Select Bank Name</option>
                                        @foreach ($bank as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('bank_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
