@extends('layouts.admin_template')

@section('content')

    <h1>Melihat Assignment</h1>
    
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

<script>
$(document).ready(function() {
  $('.test-popup-link').magnificPopup({type:'image'});

});
</script>

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
                                  

                              <?php 

                             
                              echo '<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{ $assignment->Milestone }}" aria-valuemin="0" aria-valuemax="100" style="width:',$stepke,'%">' ?> ;                 
                           
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

                     
                           <hr>
                            <h5>Action</h5>
                                <div class="text-left mtop20">                        
                                    
                                
                                    {!! Form::open(['url' => 'notifikasis', 'class' => 'form-horizontal col-md-4']) !!}                         

                                           {!! Form::hidden('Title', $assignment->Assn_Nama) !!}
                                           {!! Form::hidden('Assn_ID', $assignment->Assn_ID) !!}
                                           {!! Form::hidden('Sender', Auth::user()->user_ID ) !!}
                                           {!! Form::hidden('Receiver', $assignment->Staff_Prog_ID_Do ) !!}
                                        <br>
                                        {!! Form::submit('Remind', ['class' => 'btn btn-sm btn-warning form-control']) !!}
                                  {!! Form::close() !!}
                                </div>
                                <br>


                        

                </div>
            </div>
            <br/>
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
            <br/>
            <div class="timeline-body">
                        
                        @foreach($files as $item)

                        <?php
                        echo '<a class="test-popup-link" href="http://localhost/TestRepo3/simpony2/resources/uploads/'.$item->File.'"><img src="http://localhost/TestRepo3/simpony2/resources/uploads/'.$item->File.'" alt="..." height="150"  class="test-popup-link" ></a>';
                        ?>

                        @endforeach

                        <hr>
                        <br/>

                      </div>

        </div>
        </div>
        </div>

      
<!-- div tutup body-->





@endsection