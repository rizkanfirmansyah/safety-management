<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Hazard</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="stylesheet" href="/assets/css/reporter.css" />
  </head>
  <body>
    <nav>
      <div class="logo-name">
        <div class="logo-image">
          <img src="../img/dirgantara.png" style="filter: brightness(1) grayscale(1) invert();" alt="" />
        </div>
        <span class="logo_name">SAFETY <a href="" class="warna">MANAGEMENT</a> </span>
      </div>
      <div class="menu-items">
        <ul class="nav-link">
          <li>
            <a href="dashboard.html">
              <i class="uil uil-estate"></i>
              <span class="link-name">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="safety.html">
              <i class="uil uil-file-edit-alt logo"></i>
              <span class="link-name">Def Safety</span>
            </a>
          </li>
          <li>
            <a href="users.html">
              <i class="uil uil-user"></i>
              <span class="link-name">Otoritas User</span>
            </a>
          </li>
        </ul>

        <ul class="logout-mod">
          <li>
            <a href="../../index.html">
              <i class="uil uil-signout"></i>
              <span class="link-name">Logout!</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <section class="dashboard">
      <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
        <div class="petugas">
          <i class="uil uil-user"></i>
            <span>Annisa Fitria</span>
          </div>
        </div>
      </div>

      <section class="container">
        <div class="header">
            <span>Form Hazard Report</span>
            <i>Pelaporan Hazard paling lambat maksimal 1x24 jam</i>
        </div>
        <div class="main">
            <form action="" class="form"> 
                <label for="category"> Category :</label>
                <select class="input" name="category" id="category" placeholder="-- Choose Category--">
                    <option selected="">--Choose Category--</option>
                    <option value="1"></option>
                </select>
              <br>

                <label for="">Date of Submission : </label>
                <input class="input" type="ac">
                <br>

                <label for="">Date of Hazard Identification :</label>
                <input class="input" type="text" required>
                <br>

                <label for="">Location :</label>
                <input class="input" type="text" required>
                <br>
              
                <label for="">Type of Operation :</label>
                <select class="input" name="type" id="type" placeholder="type">
                  <option selected="">Choose type</option>
                  <option value="1">Aircraft Maintenance</option>
                  <option value="2">Aurcraft Component / Interior Maintenance</option>
                  <option value="3">Dismanting</option>
                  <option value="4">Minor / Major Repair</option>
                  <option value="5">Ground Run</option>
                  <option value="6">Functional Test</option>
                  <option value="7">Aircraft Modification</option>
                </select>
                <br>

                <label for="">Hazard Description :</label>
                <input class="input" type="text" required>
                <br>

                <label for="">File Upload :</label>
                <input class="input" type="file" required>
                <br>
            </form>
        </div>
        <div class="footer">
          <a href="" class="submit">
            <button>Submit</button>
          </a>

          <a href="" class="cancel">
            <button>Cancel</button>
          </a>
        </div>
      </section>
    </section>

    <script src="script.js"></script>
  </body>
</html>
