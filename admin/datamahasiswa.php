<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/style/style.css">
</head>

<body>
  <nav class="navbar" style="background-color: #e3f2fd;">
    <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="./asset/img/iti.png" alt="Logo" width="75" height="75" class="d-inline-block align-text-center">
          <span class="fs-1"><span class="me-5"></span>Institut Teknologi Indonesia</span>
        </a>
      </div>
    </nav>
  </nav>

  <div class="isi-content">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px; height: 88vh;">
      <div class="side-judul">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" fill="currentColor" class="bi bi-house me-2" viewBox="0 0 16 16">
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
          </svg>
          <span class="fs-2">Menu</span>
        </a>
      </div>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="index.php" class="nav-link link-body-emphasis" >
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
            Dashboard
          </a>
        </li>
        <li>
          <a href="dashboard.html" class="nav-link link-body-emphasis">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
            Informasi SKKM
          </a>
        </li>
        <li>
          <a href="dashboard.html" class="nav-link link-body-emphasis">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
            Approved Kegiatan
          </a>
        </li>
        <li>
          <a href="datamahasiswa.php" class="nav-link active">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
            Data Mahasiswa
          </a>
        </li>
        <li>
          <a href="#" class="nav-link link-body-emphasis">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
            Profile
          </a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu text-small shadow">
          <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
        </ul>
      </div>
    </div>

    <section class="data_mhs">
        <h4>Data Mahasiswa</h4>
        <nav>
            <a href="create.php">Create Data</a>
        </nav>

        <?php
            // inisialisasi koneksi db
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "db_sikm";

            //pembuatan koneksi db
            $conn = new mysqli($servername,$username,$password,$dbname);

            //pengecekan koneksi db
            if($conn -> connect_error){
                die("connection Failed" . $conn -> connect_error);
            }

        ?>
        
        <table class="table align-middle">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">NRP</th>
                <th scope="col">Nama</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Semester</th>
                <th scope="col">Alamat</th>
                <th scope="col">Foto</th>
                <th scope="col">Tgl-Lahir</th>
                <th scope="col">Nilai</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody class="table-body">
              <?php
                  $sqlQuery = "SELECT * FROM mahasiswa";
                  $result = $conn->query($sqlQuery);

                  if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo"
                      <tr> 
                          <td>".$row["id_mhs"]."</td>
                          <td>".$row["nrp"]."</td>
                          <td>".$row["nama"]."</td>
                          <td>".$row["jurusan"]."</td>
                          <td>".$row["semester"]."</td>
                          <td>".$row["alamat"]."</td>
                          <td>
                              <div>
                                  <img src='asset/foto/".$row["foto"]."'>
                              </div>
                          </td>
                          <td>".$row["tgl_lahir"]."</td>
                          <td>".$row["nilai"]."</td>
                          <td>
                              <div>
                                  <a href='read.php?id=".$row["id_mhs"]."'>Read</a>
                                  <a href='update.php?id=".$row["id_mhs"]."'>Update</a>
                              </div>
                          </td>
                      </tr>";
                  }
                  } else {
                  echo "0 results";
                  }
                  ?>
            </tbody>
        </table>
        


    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>