@extends('admin.common.master')

@section('content')
    <!--Data table-->


    {{--    //cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css--}}









    <div class="card card-custom">

        <div class="card-header">

            <div class="card-title">

                    <span class="card-icon">

                      <i class="flaticon2-heart-rate-monitor text-primary"></i>

                    </span>

                <h3 class="card-label">users</h3>

            </div>
            <div class="card-toolbar">

                <a href="{{ route('register') }}}" class="btn btn-primary font-weight-bolder">

                    <i class="la la-plus"></i>New Record</a>



            </div>






        </div>

        <div class="card-body theDataTable">

            <!--begin: Datatable-->

            <table  class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">

                <thead class="cf">



                <tr>


                    <th>name</th>
                    <th>role</th>
                    <th>status</th>
                    <th>email</th>

                    <th>Action</th>



                </tr>

                </thead>
                <tbody>
                @foreach($users as $key=> $item)
                    <tr>
                <?php if ($key > 0): ?>

                        <td>{{$item->name}}</td>

                        <td>{{$item['roles'][0]->display_name}}</td>



                        <?php
                    if ($item['roles'][0]->id == 4){
                        echo'<td> <button type="button" class="btn btn-danger">Customer</button></td>';

                    }
                    elseif(isset($item->isActive)){
                        echo "<td> <button type='button' class='btn btn-danger'> there is " .$item->isActive. " post Not active</button></td> ";
//                        if (isset($item->isActive)){

//                        }else{
//                        echo'<td> <button type="button" class="btn btn-success">hospital Not active</button></td>';
//                        }
                    }else{
                        echo'<td> <button  class="btn btn-danger">Doctor Not active</button></td>';

                    }
                        ?>
                    <td>{{$item->email}}</td>

                        <td>
                            @if(isset($item->isActive))
                                @if ($item['roles'][0]->id == 2)
                                <div class='d-inline mr-4'><a class='btn btn-light-primary font-weight-bold' href='{{route('users.show',$item->id)}}'><i class="icon-2x text-info flaticon2-list-2"></i></i></a></div>
                                @elseif($item['roles'][0]->id == 3)
                                    <div class='d-inline mr-4'><a class='btn btn-light-primary font-weight-bold' href='{{route('users.edit',$item->id)}}'><i class="icon-2x text-info flaticon2-list-2"></i></i></a></div>

                                @endif
                            @endif

                              <button  class="btn btn-light-primary font-weight-bold delete" url="{{route('users.destroy',$item->id)}}" id="{{ $item->id }}"><i class='glyphicon glyphicon-trash text-danger'></i></button>

                        <?php endif; ?>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>



        </div>

    </div>









@endsection
