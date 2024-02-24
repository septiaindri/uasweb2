<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
    body {
      background-image: url(img/tentang-kami.jpg);
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>

<body>
  <div class="position-absolute top-50 start-50 translate-middle">
    <div class="card shadow p-3 mb-5 bg-body rounded opacity-75" style=" width: 20rem; height: 20rem;">
      <div class="card-body">
        <div class="text-center mb-5">
          <h2 class="card-title" style="text-decoration: underline;">
            LOGIN
          </h2>
        </div>
        <!-- Form Login -->
        <form action="proses-login.php" method="POST">
          <div class="mb-3">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>
          <div class="text-center d-grid gap-2 mb-4">
            <button type="submit" class="btn btn-outline-success">Submit</button>
          </div>
          <div class="text-center">
            <a href="index.php">Kembali Ke Halaman</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>