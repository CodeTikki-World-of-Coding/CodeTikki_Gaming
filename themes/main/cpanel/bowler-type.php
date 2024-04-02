<head>
    <style>
.container{
    width:500px;
}
        h5.title{
            background-color:#FF4D00 !important;
            width:230px;
            height:30px;
            border:1 px solid;
            margin:0 auto;
            text-align: center;
            padding:2px;
            border-radius:5px;
        }
        h5.title a{
            text-decoration:none;
            color:#fff;
         
        }
        .card{
            width:149px;
            height:63px;
            border-radius: 0px 36px 0px 35px;
            background:#FF4D00;
        }
        .card-body a{
            text-decoration:none;
            color:#fff;
        }
        .modal-body button{
            border-radius: 0px 20px 0px 20px;
            background-color:#fff !important;
            color:#000 !important;
            width:100px;

        }
        .modal-body  .second-btn{
            margin:45px 0px 0px 145px ;
            width:130px;
        }
        .modal-body h5{
            align-items:center;
            text-align:center;
            margin:0 auto;
        }
        .modal-content{
            width:60% !important;
            background:#F58585 !important;
            color:#fff;
            height:35% !important;
        }
            </style>
</head>
<div class="container">
<h5 class="title">
<a href="#" data-bs-toggle="modal" data-bs-target="#selectModal">Select Bowler Type</a>
                </h5>
        <div class="row mt-5">
                
            <div class="col-md-6 ">
                <div class="card ml-4">
                    <div class="card-body">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#spinModal">Spin</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#seamModal">Seam</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- select bowler  Modal -->
<div class="modal fade" id="selectModal" tabindex="-1" aria-labelledby="selectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            
            <div class="modal-body">
            <h5 class="modal-title" id="spinModalLabel">Select Bowler Type</h5>

               </div>
        </div>
    </div>
</div>

<!-- Spin Modal -->
<div class="modal fade" id="spinModal" tabindex="-1" aria-labelledby="spinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            
            <div class="modal-body">
            <h5 class="modal-title" id="spinModalLabel">Spin</h5>

                <button type="button" class="btn " >Leg spin</button>
                <button type="button" class="btn second-btn ">Off spin</button>
            </div>
        </div>
    </div>
</div>

<!-- Seam Modal -->
<div class="modal fade" id="seamModal" tabindex="-1" aria-labelledby="seamModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            
            <div class="modal-body">
            <h5 class="modal-title" id="spinModalLabel">Seam</h5>

                <button type="button" class="btn " >Fast seam</button>
                <button type="button" class="btn second-btn ">Midium Seam</button>
            </div>
        </div>
    </div>
</div>

