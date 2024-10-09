


    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-10 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Usuarios</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Usuarios
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-header-right col-md-2 col-12 d-none d-md-inline-block">
            
            <button type="button" class="btn-gradient-secondary btn-sm white" data-toggle="modal" data-target="#purchaseBTCModalLabel">Crear Usuario</button>
        </div>
        </div>
        <div class="content-detached content-left">
          <div class="content-body">

          <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>N.</th> 
                                                <th>Nombre </th>                                               
                                                <th>Apellido Paterno</th>                                                    
                                                <th>Apellido Materno</th>                                                
                                                <th>Carnet</th>
                                                <th>Telefono</th>
                                                <th>Rol</th> 
                                                <th>Estado</th>                                                
                                                <th class="text-right">Accion</th>
                                            </tr><!--end tr-->
                                            </thead>
        
                                            <tbody>
                                            <?php
                                            if($personas){
                                            $contador=1;
                                            foreach($personas->result() as $row){
                                            
                                            ?>
                                            <tr>
                                                <td><?php echo $contador; ?></td>
                                                <td><?php echo $row->nombre; ?></td>
                                                <td><?php echo $row->primerApellido; ?></td>
                                                <td><?php echo $row->segundoApellido; ?></td>
                                                <td><?php echo $row->carnet; ?></td>
                                                <td><?php echo $row->telefono; ?></td>
                                                <td><?php echo $row->rol; ?></td>
                                                <td><?php echo $row->estado; ?></td>                                                
                                                
                                                <td>
                                                    <?php
                                                    echo form_open_multipart("usuario/modificar");
                                                    ?>
                                                        <input type="hidden" name="idEstudiante" value="<?php echo $row->idEstudiante; ?>">
                                                        
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModificarUsuario" >Modificar</button>
                                                    <?php  
                                                    echo form_close();
                                                    ?>
                                                </td>
                                                <td>	
                                                    <?php
                                                    echo form_open_multipart("usuario/eliminarbd");
                                                    ?>
                                                        <input type="hidden" name="idEstudiante" value="<?php echo $row->idEstudiante; ?>">
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    <?php  
                                                    echo form_close();
                                                    ?>                                                  
                                                    
                                                </td>
                                            </tr><!--end tr-->
                                            <?php
                                            $contador++;
                                            }
                                        }
                                            ?>
                                                                    
                                            </tbody>
                                        </table>                    
                                    </div>    
                                    <div class="row">
                                        <div class="col">
                                            
                                        </div><!--end col-->      
                                        <div class="col-auto">
                                            <nav aria-label="...">
                                                <ul class="pagination pagination-sm mb-0">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                    </li>
                                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">Next</a>
                                                    </li>
                                                </ul><!--end pagination-->
                                            </nav><!--end nav-->       
                                         </div> <!--end col-->                               
                                    </div><!--end row-->                                              
                                </div><!--end card-body--> 
                            </div><!--end card--> 
                        </div> <!--end col-->                               
</div>
<!--end row--> 





<!-- Purchase with BTC Modal -->
<div class="modal fade" id="purchaseBTCModalLabel" tabindex="-1" role="dialog" aria-labelledby="purchaseBTCModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="purchaseModalLabel">Crear usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-content">
                    <div class="card-body">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-2 col-12 d-none d-md-block">
                                    
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                echo form_open_multipart("usuario/agregarbd");
                ?>
                <form class="form form-horizontal mt-2 mx-2">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <div class="form-group row">
                                    <label class="col-2 label-control" for="projectinput1">Nombre</label>
                                    <fieldset class="col-10">
                                      <div class="input-group">
                                        <input type="text" name="nombre" class="form-control" value="" aria-describedby="basic-addon4">
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="basic-addon4"><i ></i></span>
                                        </div>
                                      </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <fieldset class="col-12">
                                  <p class="mb-0 text-center font-medium-5"></p>
                                </fieldset>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group row">
                                    <label class="col-2 label-control" for="projectinput2">Apellido Paterno</label>
                                    <fieldset class="col-10">
                                      <div class="input-group">
                                        <input type="text" name="primerApellido" class="form-control" value="" aria-describedby="basic-addon4">
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="basic-addon4"><i class="icon-layers"></i></span>
                                        </div>
                                      </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <div class="form-group row">
                                    <label class="col-2 label-control" for="projectinput1">Apellido Materno</label>
                                    <fieldset class="col-10">
                                      <div class="input-group">
                                        <input type="text" name="segundoApellido" class="form-control" value="" aria-describedby="basic-addon4">
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="basic-addon4"><i ></i></span>
                                        </div>
                                      </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <fieldset class="col-12">
                                  <p class="mb-0 text-center font-medium-5"></p>
                                </fieldset>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group row">
                                    <label class="col-2 label-control" for="projectinput2">Carnet</label>
                                    <fieldset class="col-10">
                                      <div class="input-group">
                                        <input type="text" name="carnet" class="form-control" value="" aria-describedby="basic-addon4">
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="basic-addon4"><i class="icon-layers"></i></span>
                                        </div>
                                      </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <div class="form-group row">
                                    <label class="col-2 label-control" for="projectinput1">Telefono</label>
                                    <fieldset class="col-10">
                                      <div class="input-group">
                                        <input type="text" name="telefono" class="form-control" value="" aria-describedby="basic-addon4">
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="basic-addon4"><i ></i></span>
                                        </div>
                                      </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <fieldset class="col-12">
                                  <p class="mb-0 text-center font-medium-5"></p>
                                </fieldset>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group row">
                                    <label class="col-2 label-control" for="projectinput2">Rol</label>
                                    <fieldset class="col-10">
                                      <div class="input-group">
                                        <input type="text" name="rol" class="form-control" value="" aria-describedby="basic-addon4">
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="basic-addon4"><i class="icon-layers"></i></span>
                                        </div>
                                      </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group row">
                                    <label class="col-2 label-control" for="projectinput2">Estado</label>
                                    <fieldset class="col-10">
                                      <div class="input-group">
                                        <input type="text" name="estado" class="form-control" value="" aria-describedby="basic-addon4">
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="basic-addon4"><i class="icon-layers"></i></span>
                                        </div>
                                      </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn-gradient-primary btn-block my-1">Crear usuario</button>
                    </div>
                </form>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>
<!--/ Purchase with BTC Modal -->

<!-- Purchase with ETH Modal -->
<!-- Purchase with BTC Modal -->
<div class="modal fade" id="ModificarUsuario" tabindex="-1" role="dialog" aria-labelledby="purchaseBTCModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="purchaseModalLabel">Modificar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-content">
                    <div class="card-body">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-2 col-12 d-none d-md-block">
                                    
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                foreach ($personas->result() as $row)
                {
                echo form_open_multipart("usuario/modificarbd");
                ?>
                <form class="form form-horizontal mt-2 mx-2">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-6">
                                <input type="hidden" name="idEstudiante" value="<?php echo $row->idEstudiante; ?>">
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group row">
                                    <label class="col-2 label-control" for="projectinput1">Nombre</label>
                                    <fieldset class="col-10">
                                      <div class="input-group">
                                        <input type="text" name="nombre" class="form-control" value="<?php echo $row->nombre; ?>" required aria-describedby="basic-addon4">
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="basic-addon4"><i ></i></span>
                                        </div>
                                      </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <fieldset class="col-12">
                                  <p class="mb-0 text-center font-medium-5"></p>
                                </fieldset>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group row">
                                    <label class="col-2 label-control" for="projectinput2">Apellido Paterno</label>
                                    <fieldset class="col-10">
                                      <div class="input-group">
                                        <input type="text" name="primerApellido" class="form-control" value="<?php echo $row->primerApellido; ?>" required aria-describedby="basic-addon4">
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="basic-addon4"><i class="icon-layers"></i></span>
                                        </div>
                                      </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <div class="form-group row">
                                    <label class="col-2 label-control" for="projectinput2">Apellido Materno</label>
                                    <fieldset class="col-10">
                                      <div class="input-group">
                                        <input type="text" name="segundoApellido" class="form-control" value="<?php echo $row->segundoApellido; ?>" required aria-describedby="basic-addon4">
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="basic-addon4"><i ></i></span>
                                        </div>
                                      </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <fieldset class="col-12">
                                  <p class="mb-0 text-center font-medium-5"></p>
                                </fieldset>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group row">
                                    <label class="col-2 label-control" for="projectinput2">Carnet</label>
                                    <fieldset class="col-10">
                                      <div class="input-group">
                                        <input type="text" name="carnet" class="form-control" value="<?php echo $row->carnet; ?>" required aria-describedby="basic-addon4">
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="basic-addon4"><i class="icon-layers"></i></span>
                                        </div>
                                      </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <div class="form-group row">
                                    <label class="col-2 label-control" for="projectinput1">Telefono</label>
                                    <fieldset class="col-10">
                                      <div class="input-group">
                                        <input type="text" name="telefono" class="form-control" value="<?php echo $row->telefono; ?>" required aria-describedby="basic-addon4">
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="basic-addon4"><i ></i></span>
                                        </div>
                                      </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <fieldset class="col-12">
                                  <p class="mb-0 text-center font-medium-5"></p>
                                </fieldset>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group row">
                                    <label class="col-2 label-control" for="projectinput2">Rol</label>
                                    <fieldset class="col-10">
                                      <div class="input-group">
                                        <input type="text" name="rol" class="form-control" value="<?php echo $row->rol; ?>" required aria-describedby="basic-addon4">
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="basic-addon4"><i class="icon-layers"></i></span>
                                        </div>
                                      </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group row">
                                    <label class="col-2 label-control" for="projectinput2">Estado</label>
                                    <fieldset class="col-10">
                                      <div class="input-group">
                                        <input type="text" name="estado" class="form-control" value="<?php echo $row->estado; ?>" required aria-describedby="basic-addon4">
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="basic-addon4"><i class="icon-layers"></i></span>
                                        </div>
                                      </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn-gradient-primary btn-block my-1">Modificar usuario</button>
                    </div>
                </form>
                <?php
                echo form_close();
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!--/ Purchase with BTC Modal -->

<!--/ Purchase with ETH Modal -->

<!-- Purchase with USDT Modal -->

<!--/ Purchase with USDT Modal -->
          </div>
        </div>
        <div class="sidebar-detached sidebar-right" ="">
          <div class="sidebar"><div class="sidebar-content">
    <!-- token sale progress -->
   
    <
    <!--/ token sale progress -->
    
</div>




          </div>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

  </body>
