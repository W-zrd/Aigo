<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('/asset/css/dashboardDoc.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="{{ asset('/asset/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Doctor Transaction</title>
  </head>
  <body>
  @include('doctor-sidebar')
  <div class="container-flex" >
    <div class="content">
        <main class="main-column">
            <div class="main-content">
                <section class="payment-section">
                    <div class="payment-card">
                        <div class="earning-card">
                            <div class="earning-title">Total Earnings</div>
                            <div class="earning-amount">₹430.00</div>
                            <div class="earning-date">as of 01-December 2022</div>
                        </div>
                    </div>
                    <div class="payment-card">
                        <div class="pending-card">
                            <div class="pending-title">Pending Payments</div>
                            <div class="pending-amount">₹100.00</div>
                            <div class="pending-date">as of 01-December 2022</div>
                        </div>
                    </div>
                </section>
                <div class="payment-title">Payment History</div>
                <div class="tab-container">
                    <div class="tab">All</div>
                    <div class="tab">Complete</div>
                    <div class="tab">Pending</div>
                    <div class="tab">Rejected</div>
                </div>
                <section class="payment-history">
    <div class="history-header">
        <div class="history-column">Order ID</div>
        <div class="history-column">Date</div>
        <div class="history-column">Amount</div>
        <div class="history-column">Total Questions</div>
        <div class="history-column">Status</div>
        <div class="history-column">Action</div>
    </div>
    <div class="history-body">
        <div class="history-entry">#15267</div>
        <div class="history-entry">Mar 1, 2023</div>
        <div class="history-entry">100</div>
        <div class="history-entry">1</div>
        <div class="history-entry status-success">Success</div>
        <button class="history-entry entry-detail">Detail</button>
    </div>
    <div class="history-body">
        <div class="history-entry">#153587</div>
        <div class="history-entry">Jan 26, 2023</div>
        <div class="history-entry">300</div>
        <div class="history-entry">3</div>
        <div class="history-entry status-success">Success</div>
        <button class="history-entry entry-detail">Detail</button>
    </div>
    <div class="history-body">
        <div class="history-entry">#12436</div>
        <div class="history-entry">Feb 12, 2033</div>
        <div class="history-entry">100</div>
        <div class="history-entry">1</div>
        <div class="history-entry status-success">Success</div>
        <button class="history-entry entry-detail">Detail</button>
    </div>
    <div class="history-body">
        <div class="history-entry">#16879</div>
        <div class="history-entry">Feb 28, 2033</div>
        <div class="history-entry">500</div>
        <div class="history-entry">5</div>
        <div class="history-entry status-rejected">Rejected</div>
        <button class="history-entry entry-detail">Detail</button>
    </div>
    <div class="history-body">
        <div class="history-entry">#16378</div>
        <div class="history-entry">March 13, 2033</div>
        <div class="history-entry">500</div>
        <div class="history-entry">5</div>
        <div class="history-entry status-success">Success</div>
        <button class="history-entry entry-detail">Detail</button>
    </div>
    <div class="history-body">
        <div class="history-entry">#16609</div>
        <div class="history-entry">March 18, 2033</div>
        <div class="history-entry">100</div>
        <div class="history-entry">1</div>
        <div class="history-entry status-pending">Pending</div>
         <div class="history-entry history-entry-actions">
            <button class="entry-accept">Approve</button>
            <button class="entry-decline">Decline</button>
        </div>
    </div>
</section>

                
            </div>
        </main>
    </div>
  </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>