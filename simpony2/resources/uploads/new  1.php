@extends('layouts.admin_template')

@section('content')
<head>
 <style>
    hr {
  margin-top: 0px;
  margin-bottom: 0px;
  border: 0;
  border-top: 1px solid #eee;}

  .comments {
    overflow-y: scroll;
    overflow-x:hidden; 

  }

</style>
</head>
   <div class="container-fluid">
    <div class="row">
        <div class="box col-md-12">

            <h3>
               Judul
            </h3>


            <hr>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3">
                        <h4>Tgl. Request</h4> 
                        <p>asdkans<p>
                        </div>
                        <div class="col-md-3">
                        <h4>Deadline</h4> 
                        <p>asdkans<p>
                        </div>
                        <div class="col-md-3">
                            <h4>Status</h4>
                            <p>asdkans<p>
                        </div>
                        <div class="col-md-3">
                            <h4>Progress</h4>
                            <div class="progress progress-xs">
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                  <span class="sr-only">60% Complete (warning)</span>
                </div>
              </div>
                        </div>
                    </div>
                     <hr>
                    <div class="row">
                        <div class="col-md-8">
                            <h4> Penanggung Jawab </h4>
                            <p>Head Of Dept : Toni Prabowo<p>
                                <p>Head Group : Adhika Pradipta<p>
                                    <p>Staff : Kane Widyasputry<p>
                        </div>
                        
                        <div class="col-md-4">
                            <h4> Files </h4>
                            <a href=""><i class="fa fa-picture-o"></i> Logo.png</a>
                        </div>
                    </div>
                                    
                    <!-- disini buat reminder -->
                    <div class="row">
                        <div class="col-md-4">
                            <a href="#" class="btn btn-sm btn-warning">Remind</a>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                <!-- disini buat reminder -->


                </div>
                <!-- Tempat naro deskripsi -->
               

                <div class="col-md-4">
                    <h5>
                        Deskripsi
                    </h5>
                    <p>
                        Deskripsi taro sini asdasdasddddd
                        dddddddddddddddd
                        dddddddddddddddddddddd
                        dddddddddddddddddddddd
                        dddddddddddddddddddd
                        dddddddddddd
                    </p>

                    <br>

                    <h5>
                    Pengirim
                    </h5>
                    <p>Adhika Pradipta<p>
                    
                    <br>

                    <!-- Action:HOD/HG-->
                    <?php if (1 == 2) 
                        {
                            echo ' <h5>Action</h5>
                                <div class="text-left mtop20">                        
                                    <a href="#" class="btn btn-sm btn-success">Approve</a>
                                    <a href="#" class="btn btn-sm btn-danger">Reject</a>
                                </div>
                                <br>';
                        }
                    ?>
                   
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-body">
            <h5>
                Task
            </h5>
            <hr>
            <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        
                      </div>

        </div>
        </div>
        </div>
        <div class="col-md-4">
            <div class="box comments" style="height:300px;">
                <div class="box-body">
            <h5>
                Comments
            </h5>
            <hr>
            <br>

            <div class="box-comment">
                <!-- User image -->
                <!-- <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">
 -->
                <div class="comment-text">
                      <span class="username">
                        <strong>Tes</strong>
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                <p>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                   <p>
                </div>
                <!-- /.comment-text -->
              </div>
              <hr>
            <br>
            <div class="box-comment">
                <!-- User image -->
                <!-- <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">
 -->
                <div class="comment-text">
                      <span class="username">
                        <strong>Tes</strong>
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                <p>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                   <p>
                </div>
                <!-- /.comment-text -->
              </div>
              <hr>
            <br>
            <div class="box-comment">
                <!-- User image -->
                <!-- <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">
 -->
                <div class="comment-text">
                      <span class="username">
                        <strong>Tes</strong>
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                <p>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                   <p>
                </div>
                <!-- /.comment-text -->
              </div>
              <hr>
            <br>

            <form role="form">
                <div class="form-group">
                     
                    
                    <input placeholder="Tinggalkan pesan" type="text" class="form-control" id="comment" />
                </div>
               
                
                <button type="submit" class="btn btn-default pull-right">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
</div>




        </div>



   
@endsection
