@extends('cms.templates.template')

@section('content')
<!-- page content -->
      <div class="right_col" role="main">
        <div class="">

          <div class="page-title">
            <div class="title_right">
              <h3>{!!$fqc->page_name!!}</h3>
            </div>
            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Edite los campos necesarios</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                    {!!Form::open(['data-parsley-validate','route'=> ['question.update', $fqc->id],'method'=>'PUT', 'class'=>'form-horizontal form-label-left'])!!}
                    
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"># <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input readonly type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value={!!'"'.$fqc->number.', '.$fqc->letter.'"'!!}>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Enunciado <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="statement" required="required" class="form-control" name="statement" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                          data-parsley-validation-threshold="10">{!!$fqc->statement!!}</textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Puntaje total <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input readonly type="text" id="dni" name="dni" required="required" class="form-control col-md-7 col-xs-12" value={!!'"'.$fqc->total_score.'"'!!}>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Num opciones <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input readonly type="text" id="dni" name="dni" required="required" class="form-control col-md-7 col-xs-12" value={!!'"'.$fqc->num_options.'"'!!}>
                      </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="/question/" type="submit" class="btn btn-primary">Cancelar</a>
                        <button type="submit" class="btn btn-success">Enviar</button>
                      </div>
                    </div>

                  </form>

                </div>
              </div>
            </div>
          </div>

          <div class="row">

          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Listado de respuestas</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table id="list_table" class="display dataTable">
                  <thead>
                    <tr>
                      <th>Letra</th>
                      <th>Enunciado</th>
                      <th>tiempo(seg)</th>                  
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($fqc->answers as $answer)
                    <tr>
                      <th scope="row">{!!$answer->letter!!}</th>
                      <td>{!!$answer->value!!}</td>
                      <td>{!!$answer->time!!}</td>              
                      <td>
                        <?php 
                          if (is_null($answer->deleted_at)) {
                            $route_edit = "/answer/".$answer->id_md5."/edit/";
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
        <!-- /page content -->


@endsection


@section('scripts')

@endsection