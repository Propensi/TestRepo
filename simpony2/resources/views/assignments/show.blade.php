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
                        {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}  {!! Form::close() !!}

                    </td>
                    <td>
                        {!! Form::submit('Remind', ['class' => 'btn btn-primary form-control']) !!}  {!! Form::close() !!}
                        
                    </td>
                </tr>
            </tbody>    
        </table>
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
                                
                              <?php echo '<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{ $assignment->Milestone }}" aria-valuemin="0" aria-valuemax="100" style="width:',$assignment->Milestone,'%">' ?>                  
                                
                                    <span class="sr-only">80% Complete (warning)</span>
                                </div>
                            </div>
                        </div>
            </div>

                   <hr>

            <div class="row">
                        <div class="col-md-8">
                            <h4> Penanggung Jawab </h4>
                            <p>Head Of Dept : 
                              <?php if ($hod == NULL) {
                                        } else {
                                           echo    $hod->name ;
                                        }
                                      ?>

                            </p>
                                <p>Head Group :
                                  <?php if ($head == NULL) {
                                        } else {
                                           echo    $head->name ;
                                        }
                                      ?>

                                  </p>
                                    <p>Staff :         
                                      <?php if ($staff == NULL) {
                                        } else {
                                           echo    $staff->name ;
                                        }
                                      ?>

                                      </p>
                        </div>

                        <div class="col-md-4">
                            <h4> Files </h4>
                            <a href=""><i class="fa fa-picture-o"></i> {{$assignment->Assn_File}}</a>
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
                    <p>{{$pengirim->name}}<p>
                    
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
                 

@foreach($comments as $item)

                <div class="box-comment">
                
                <div class="comment-text">
                      <span class="username">
                        <strong>{{ $item->name }}</strong>
                        <span class="text-muted pull-right">{{ $item->created_at }} </span>
                      </span>
                <p>
                      {{$item->Comment}}
                   <p>
                </div>
                
              </div>
              <hr>
            <br>

@endforeach


            <!-- disini end foreach -->
            {!! Form::open(['url' => 'comments', 'class' => 'form-horizontal']) !!}
                <div class="form-group col-sm-12">

                  {!! Form::label('Comment', '', ['class' => 'form-control']) !!}
                     {!! Form::textarea('Comment', null, ['class' => 'form-control']) !!}
                    
                    <!-- <input id="Comments" placeholder="Tinggalkan pesan" type="text" class="form-control" id="comment" /> -->
               

               {!! Form::hidden('Assn_ID', $assignment->Assn_ID) !!}
               {!! Form::hidden('Sender', Auth::user()->user_ID ) !!}
            <br>
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}


        </div> 
        {!! Form::close() !!}
        </div>
    </div>
</div>
</div>

<!-- div tutup body-->
</div>



@endsection