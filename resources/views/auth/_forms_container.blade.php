<div class="forms-container">
    <div class="signin-signup">
      <form action={{route('login')}} class="sign-in-form" method="POST">
        @csrf
        <h2 class="title">
          Sign in
        </h2>
        <div class="input-field">
          <i class="uil uil-user"> </i>
          <input name="email" type="text" placeholder="username" autofocus/>
        </div>
        <div class="input-field">
          <i class="uil uil-lock"> </i>
          <input name="password" type="password" placeholder="Password" />
        </div>
        <input type="submit" value="Login" class="btn solid" />
        <p class="social-text">Follow Us on Social Media</p>
        <div class="social-media">
          <a href="#"><i class="uil uil-facebook-f"></i></a>
          <a href="#"><i class="uil uil-twitter"></i></a>
          <a href="#"><i class="uil uil-instagram"></i></a>
          <a href="#"><i class="uil uil-linkedin"></i></a>
        </div>
      </form>
<!-- registration.blade.php -->

<form action="{{ route('register') }}" class="sign-up-form" method="POST">
    @csrf
    <h2 class="title">
        Sign up
    </h2>
    <div class="input-field">
        <i class="uil uil-user"> </i>
        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username" />
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="input-field">
        <i class="uil uil-envelope"> </i>
        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" />
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="input-field">
        <i class="uil uil-lock"> </i>
        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" />
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <input type="submit" value="Sign up" class="btn solid" />
    <p class="social-text">Follow Us on Social Media</p>
    <div class="social-media">
        <a href="#"><i class="uil uil-facebook-f"></i></a>
        <a href="#"><i class="uil uil-twitter"></i></a>
        <a href="#"><i class="uil uil-instagram"></i></a>
        <a href="#"><i class="uil uil-linkedin"></i></a>
    </div>
</form>

    </div>
  </div>