@extends('cms.templates.template')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="page-title">
      <div class="title_left">        
      </div>
    </div>
    <div class="clearfix"></div>


    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>{!!$gc->title_name!!}</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="list_table" class="display dataTable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Enunciado</th>
                  <th># rptas</th>
                  <th>Ptje total</th>                  
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($gc->questions as $question)
                <tr>
                  <th scope="row">{!!$question->number.", ".$question->letter!!}</th>
                  <?php $question->statement =mb_strimwidth($question->statement, 0, 75, "...");?>
                  <td>{!!$question->statement!!}</td>
                  <td>{!!$question->num_options!!}</td>
                  <td>{!!$question->total_score!!}</td>              
                  <td>
                    <?php 
                      if (is_null($question->deleted_at)) {
                        $route_edit = "/question/".$question->id_md5."/edit/";
                        $status = "active";
                      }else{
                        $status = "inactive";
                      }
                    ?>

                    @if($status == "active")                      
                    <a href=<?php echo $route_edit;?> class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                    @else
                    @endif

                    
                  </td>         
                </tr>
                @endforeach
                              
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
@endsection


@section('scripts')

@endsection