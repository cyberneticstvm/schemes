<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Suchitwa Mission">
    <meta name="keyword" content="Suchitwa Mission">
    <title>Suchitwa Mission - Schemes Login</title>
    <link rel="icon" href="{{ public_path().'/assets/images/favicon.png' }}" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="{{ public_path().'/assets/css/al.style.min.css' }}">
    <!-- project layout css file -->
    <link rel="stylesheet" href="{{ public_path().'/assets/css/layout.f.min.css' }}">
</head>

<body>

<div id="layout-f" class="theme-cyan">

    <!-- main body area -->
    <div class="main auth-div p-2 py-3 p-xl-5">
        
        <!-- Body: Body -->
        <div class="body d-flex p-0 p-xl-5">
            <div class="container-fluid">

                <div class="row g-0">
                    <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                        <div style="max-width: 25rem;">
                            <div class="text-center mb-5">
                                <a href="/assets/login/">
                                    <img alt="Suchitwa Mission" src="{{ public_path().'/assets/images/sm_logo.png' }}">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                        <div class="w-100 p-4 p-md-5 card border-0" style="max-width: 32rem;">
                            <!-- Form -->
                            <form class="row g-1 p-0 p-md-4" method="post" action="{{ route('login') }}">
                                @csrf
                                <div class="col-12 text-center mb-5">
                                    <h1>Sign in</h1>
                                </div>
                                <div class="col-12 text-center mb-4">
                                    <a class="btn btn-lg btn-outline-secondary btn-block" href="#">
                                        <span class="d-flex justify-content-center align-items-center">
                                            <img class="avatar xs me-2" src="{{ public_path().'/assets/images/google.svg' }}" alt="Image Description">
                                            Sign in with Google
                                        </span>
                                    </a>
                                    <span class="dividers text-muted mt-4">OR</span>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control form-control-lg" placeholder="username" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <div class="form-label">
                                        </div>
                                        <input type="password" name="password" class="form-control form-control-lg" placeholder="***************" required>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-submit btn-lg btn-block btn-dark lift text-uppercase">SIGN IN</button>
                                </div>
                                @if (count($errors) > 0)
                                <div role="alert" class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                                @endif
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                </div> <!-- End Row -->
                
            </div>
        </div>

    </div>

</div>

<!-- Jquery Core Js -->
<script src="{{ public_path().'/assets/bundles/libscripts.bundle.js' }}"></script>

<!-- Jquery Page Js -->
<script src="{{ public_path().'/assets/js/template.js' }}"></script>
<script>
$('form').submit(function(){
    $(".btn-submit").attr("disabled", true);
    $(".btn-submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>&nbsp;Loading...");
});
</script>

</body>
</html>