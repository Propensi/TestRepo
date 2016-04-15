@extends('layouts.admin_template')

@section('content')

    <h1>Assignment</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>File</th>
                    <th>Staff</th>
                    <th>Departemen</th>
                    <th>Sender</th>
                    <th>Created at</th>
                    <th>Deadline</th>
                    <th>Milestone</th>
                    <th>Status</th>
                    <th>Head Group</th>
                    <th>Action</th>            
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $assignment->Assn_ID }}</td> 
                    <td> {{ $assignment->Assn_Nama }} </td>
                    <td> {{ $assignment->Assn_Deskripsi}} </td>
                    <td> {{ $assignment->Assn_File }}</td>
                    <td> 
                        <?php if ($staff == NULL) {

                        } else {
                           echo    $staff->name ;
                        }
                      ?>
                    </td>
                    <td> {{ $assignment->Dept_ID }}</td>
                    <td> {{ $assignment->Emp_ID_Req_Vald }}</td>
                    <td> {{ $assignment->created_at }}</td>
                    <td> {{ $assignment->Tgl_Deadline }} </td>
                    <td> {{ $assignment->Milestone }}</td>

                    <td>
                    <?php  
                        if (($assignment -> Assn_Status) == '1'){
                            echo 'Approved';
                        }
                    ?>
                    </td>
                    <td> 

                        <?php if ($head == NULL) {

                        } else {
                             echo  $head->name ;
                        }
                      ?>
                       

                    </td>

                    <td>
                        {!! Form::model($assignment, [
                                'method' => 'PATCH',
                                'url' => ['assignments', $assignment->Assn_ID],
                                'class' => 'form-horizontal'
                            ]) !!}

                            {!! Form::select('Milestone', (['' => 'Update Milestone'] + $steps), null, ['class' => 'form-control' , 'required'=> 'required']) !!}


                    </td>
                    
                    <td>
                        {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}

                    </td>
                    <td>
                        {!! Form::submit('Remind', ['class' => 'btn btn-primary form-control']) !!}
                        
                    </td>
                </tr>
            </tbody>    
        </table>
    </div>
        
        <div class="col-md-6">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <!-- <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image"> -->
                <span class="username"><a href="#">Assignment</a></span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <p>no picture available yet</p>

             
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
              <div class="box-comment">
                <!-- User image -->
                <!-- <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">
 -->
                <div class="comment-text">
                      <span class="username">
                        Tes
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              <div class="box-comment">
                <!-- User image -->
                <!-- <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image"> -->

                <div class="comment-text">
                      <span class="username">
                        Tes 2
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <form action="#" method="post">
                
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                  <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                </div>
              </form>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>

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
               {{ $assignment->Assn_Nama }}
            </h3>


            <hr>

            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3">
                        <h4>Tgl. Request</h4> 
                        <p>{{ substr($assignment->created_at,0,10) }}<p>
                        </div>
                        <div class="col-md-3">
                        <h4>Deadline</h4> 
                        <p>{{ $assignment->Tgl_Deadline }}<p>
                        </div>
                        <div class="col-md-3">
                            <h4>Status</h4>
                            <p>
                              <?php
                              if (($assignment -> Assn_Status) == '1'){
                            echo 'Approved';
                        }
                          ?>

                              <p>
                        </div>

                        <div class="col-md-3">
                            <h4>Progress</h4> <!-- masih belom tau mau gmn -->
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    <span class="sr-only">80% Complete (warning)</span>
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
                                    
                    <!-- disini buat reminder {{ Auth::User()->role }} == Head Group atau Head of Dept.-->

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
                       {{ 

                       $assignment->Assn_Deskripsi

                     }}
                    </p>

                    <br>

                    <h5>
                    Pengirim
                    </h5>
                    <p>Adhika Pradipta<p>
                    
                    <br>

                     
                           
                            <h5>Action</h5>
                                <div class="text-left mtop20">                        
                                    <a href="#" class="btn btn-sm btn-success">Approve</a>
                                    <a href="#" class="btn btn-sm btn-danger">Reject</a>
                                </div>
                                <br>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- klo hg/hod baru dimunculin guys ubah ifnya aja-->

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


@foreach($comments as $item)
                {{-- */$x++;/* --}}



@endforeach




@endsection