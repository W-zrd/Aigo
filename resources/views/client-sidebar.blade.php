<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

  <link href="{{ asset('/asset/admin.css') }}" rel="stylesheet" />
  <link href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <style>
  </style>
  <title>Dashboard</title>
</head>
<body>

  <div class="container-flex">

    <!-- SIDEBAR -->
    <div class="sidebar">
      <div class="container-flex header-logo p-0">
        <img src="{{ asset('/asset/svg/logo-white.svg') }}" alt="" style="height: 36px; " >
        <h4 style="color: #F6F7FF" class="ms-2 mt-2"> Aigo </h4>
      </div>

      <div class="dashboard">
        <a href="{{ route('dashboard') }}">
          <button type="button" class="btn-dashboard">Dashboard</button>
        </a>
        
      </div>
      
      <div class="">
        {{-- MENU 1: USER DETAILS --}}
        <div class="menu">
          <aside></aside>
          <h6>User Details</h6>
        </div>

        {{-- SUB-MENU 1: Activity Report --}}
        <div class="btn-group submenu ms-4 ps-2 mb-3">
          <span class="material-symbols-outlined"> monitoring </span>
          <a href="{{ route('activity-report') }}" 
            onmouseover="this.style.color='#6FFFE9'" 
            onmouseout="this.style.color='#8296C5'">Activity Report
          </a>
        </div>

        {{-- SUB-MENU 2: Request Consultation --}}
        <div class="btn-group submenu ms-4 ps-2  mb-3">
          <span class="material-symbols-outlined"> diversity_1 </span>
          <a href="{{ route('health-data.show') }}"
            onmouseover="this.style.color='#6FFFE9'" 
            onmouseout="this.style.color='#8296C5'">Request Consultation
          </a>
        </div>

        {{-- SUB-MENU 3: Consultation Schedule --}}
        <div class="btn-group submenu ms-4 ps-2  mb-3">
          <span class="material-symbols-outlined"> calendar_month </span>
          <a href="{{ route('customer.schedule') }}"
            onmouseover="this.style.color='#6FFFE9'" 
            onmouseout="this.style.color='#8296C5'"> Schedule
          </a>
        </div>

        {{-- SUB-MENU 4: Transaction --}}
        <div class="btn-group submenu ms-4 ps-2">
          <span class="material-symbols-outlined"> payment </span>
          <a href="{{ route('customer.transaction') }}"
            onmouseover="this.style.color='#6FFFE9'" 
            onmouseout="this.style.color='#8296C5'">Transaction
          </a>
        </div>

        {{-- MENU 2: SETTINGS --}}
        <div class="menu">
          <aside></aside>
          <h6>Settings & Profile</h6>
        </div>

        {{-- SUB-MENU 1: MY PROFILE --}}
        <div class="btn-group submenu ms-4 ps-2 mb-3">
          <span class="material-symbols-outlined"> settings </span>
          <a href="{{ route('customer.profile') }}"
            onmouseover="this.style.color='#6FFFE9'" 
            onmouseout="this.style.color='#8296C5'"> My Profile
          </a>
        </div>

        {{-- SUB-MENU 2: HISTORY --}}
        <div class="btn-group submenu ms-4 ps-2">
          <span class="material-symbols-outlined"> history </span>
          <a href=""
            onmouseover="this.style.color='#6FFFE9'" 
            onmouseout="this.style.color='#8296C5'">Log & History
          </a>
        </div>

        {{-- MENU 3: HELP --}}
        <div class="menu">
          <aside></aside>
          <h6>Help & More</h6>
        </div>

        {{-- SUB-MENU 1: Privacy & Policy --}}
        <div class="btn-group submenu ms-4 ps-2">
          <span class="material-symbols-outlined"> policy </span>
          <a href="{{ route('customer.priv-policy') }}"
            onmouseover="this.style.color='#6FFFE9'" 
            onmouseout="this.style.color='#8296C5'">Privacy & Policy
          </a>
        </div>

        {{-- SUB-MENU 2: Terms & Conditions --}}
        <div class="btn-group submenu ms-4 ps-2 mt-3 mb-5">
          <span class="material-symbols-outlined"> contract </span>
          <a href="{{ route('customer.terms-con') }}" 
            onmouseover="this.style.color='#6FFFE9'" 
            onmouseout="this.style.color='#8296C5'">Terms & Conditions
          </a>
        </div>
        
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a class="logout  pt-3" href="">
            <button class="btn-logout">
            <span class="material-symbols-outlined"> logout</span>Log Out</button>
          </a>
        </form>
      </div>
    </div>
  </div>
  

  


  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  </script>
</body>
</html>