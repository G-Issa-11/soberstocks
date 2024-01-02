<div class="forms-container">
    <div class="signin-signup">
      <form action={{route('login')}} class="sign-in-form" method="POST">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger" style="margin-bottom: 25px;">
            <ul style="padding: 0px 10px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <h2 class="title">
          Sign In
        </h2>
        <div class="input-field">
          <i class="uil uil-user"> </i>
          <input name="email" type="text" placeholder="Email" autofocus/>
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
    @if ($errors->any())
    <div class="alert alert-danger" style="margin-bottom: 15px;">
        <ul style="padding: 0px 10px;">
            @foreach ($errors->all() as $error)
                <li style="list-style-type: circle;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <h2 class="title">
        Sign Up
    </h2>
    <div class="input-field">
        <i class="uil uil-user"> </i>
        <input name="name" type="text" placeholder="Username" autofocus/>
      </div>
    <div class="input-field">
        <i class="uil uil-envelope"> </i>
        <input name="email" type="text" placeholder="Email" autofocus/>
      </div>
    <div class="input-field">
        <i class="uil uil-lock"> </i>
        <input name="password" type="password" placeholder="Password" />
      </div>
    <input type="submit" value="Sign Up" class="btn solid" />
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