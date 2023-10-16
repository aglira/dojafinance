<html>

<head>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <style>
        .divider:after,
        .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        }
        .h-custom {
        height: calc(100% - 73px);
        background-color: #48D1CC;
        }
        @media (max-width: 450px) {
        .h-custom {
        height: 100%;
        }
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="{{('logo.png')}}"
                class="img-fluid" alt="Sample image">
            </div>
              <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form>
                <div class="divider d-flex align-items-center my-4">
                  <p class="text-center fw-bold mx-3 mb-0" style="font-size: 200%;">Doja Finance</p>
                </div>
      
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3" class="form-control form-control-lg"
                    placeholder="Enter username" />
                  <label class="form-label" for="form3Example3">Username</label>
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-3">
                  <input type="password" id="form3Example4" class="form-control form-control-lg"
                    placeholder="Enter password" />
                  <label class="form-label" for="form3Example4">Password</label>
                </div>
      
                <div class="d-flex justify-content-between align-items-center">
                  <!-- Checkbox -->
                  <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                      Remember me
                    </label>
                  </div>
                </div>
      
                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="button" class="btn btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #E9967A;">Login</button>
                </div>
      
              </form>
            </div>
          </div>
        </div>
        <div
          class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5"
          style="background-color: #E9967A">
          <!-- Copyright -->
          <div class="text-white mb-3 mb-md-0">
            Copyright © 2023. All rights reserved.
          </div>
          <!-- Copyright -->
<!--       
          Right
          {{-- <div>
            <a href="#!" class="text-white me-4">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#!" class="text-white me-4">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#!" class="text-white me-4">
              <i class="fab fa-google"></i>
            </a>
            <a href="#!" class="text-white">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div> --}}
          Right -->
        </div>
      </section>
</body>
</html>