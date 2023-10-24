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
              <form method="POST" action="/login">
                @csrf
                <div class="divider d-flex align-items-center my-4">
                  <p class="text-center fw-bold mx-3 mb-0" style="font-size: 200%;">Doja Finance</p>
                </div>
      
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example3" name="username" class="form-control form-control-lg"
                    placeholder="Enter username" />
                  <label class="form-label" for="form3Example3">Username</label>
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-3">
                  <input type="password" id="form3Example4" name="password" class="form-control form-control-lg"
                    placeholder="Enter password" />
                  <label class="form-label" for="form3Example4">Password</label>
                </div>

                <label for="form3Example4">Role</label>
                <select for="form3Example4" class="form-control form-control-lg">
                  <option value="pemilik">Pemilik</option>
                  <option value="admin">Admin</option>
                  <option value="anggota">Anggota</option>
                </select>
      
      
                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-lg"
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
        </div>
      </section>
</body>
</html>