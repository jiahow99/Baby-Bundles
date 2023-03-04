<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Index</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/style.default.css')}}">
    <link rel="stylesheet" href="{{asset('css/header-style.css')}}">
</head>
<body>

    <x-header.header></x-header.header>

    <section class="intro" style="height:100vh">
        <div class="bg-image h-100" style="background-image: url('{{asset('img/order-background2.jpg')}}'); background-size:cover;">
          <div class="mask d-flex align-items-center h-100">
            <div class="container">

              <div class="row justify-content-center">
                <div class="col-12">
                  <div class="card bg-light shadow-2-strong">
                    <div class="card-body">
                      <div class="table-responsive" style="border-radius:30px">
                        <table class="table table-light table-borderless mb-0">
                          <thead>
                            <tr>
                              <th scope="col">EMPLOYEES</th>
                              <th scope="col">POSITION</th>
                              <th scope="col">CONTACTS</th>
                              <th scope="col">AGE</th>
                              <th scope="col">ADDRESS</th>
                              <th scope="col">SALARY</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">Tiger Nixon</th>
                              <td>System Architect</td>
                              <td>tnixon12@example.com</td>
                              <td>61</td>
                              <td>Edinburgh</td>
                              <td>$320,800</td>
                            </tr>
                            <tr>
                              <th scope="row">Sonya Frost</th>
                              <td>Software Engineer</td>
                              <td>sfrost34@example.com</td>
                              <td>23</td>
                              <td>Edinburgh</td>
                              <td>$103,600</td>
                            </tr>
                            <tr>
                              <th scope="row">Jena Gaines</th>
                              <td>Office Manager</td>
                              <td>jgaines75@example.com</td>
                              <td>30</td>
                              <td>London</td>
                              <td>$90,560</td>
                            </tr>
                            <tr>
                              <th scope="row">Quinn Flynn</th>
                              <td>Support Lead</td>
                              <td>qflyn09@example.com</td>
                              <td>22</td>
                              <td>Edinburgh</td>
                              <td>$342,000</td>
                            </tr>
                            <tr>
                              <th scope="row">Charde Marshall</th>
                              <td>Regional Director</td>
                              <td>cmarshall28@example.com</td>
                              <td>36</td>
                              <td>San Francisco</td>
                              <td>$470,600</td>
                            </tr>
                            <tr>
                              <th scope="row">Haley Kennedy</th>
                              <td>Senior Marketing Designer</td>
                              <td>hkennedy63@example.com</td>
                              <td>43</td>
                              <td>London</td>
                              <td>$313,500</td>
                            </tr>
                            <tr>
                              <th scope="row">Tatyana Fitzpatrick</th>
                              <td>Regional Director</td>
                              <td>tfitzpatrick00@example.com</td>
                              <td>19</td>
                              <td>Warsaw</td>
                              <td>$385,750</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <x-header.footer></x-header.footer>
      
      <script src="{{asset('js/navbar-transition.js')}}"></script>
</body>
</html>