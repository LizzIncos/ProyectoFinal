
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Proveedores</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Proveedores
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-header-right col-md-4 col-12 d-none d-md-inline-block">
            <div class="btn-group float-md-right"><a class="btn-gradient-secondary btn-sm white" href="<?php echo base_url(); ?>index.php/proveedor/agregar">Registrar Proveedor</a></div>


        </div>
        </div>
        <div class="content-detached content-center">
          <div class="content-body"><div id="wallet">

  
    <!--/ TetherUSD -->

    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>N.</th> 
                                                <th>Nombre Comercial</th>                                               
                                                <th>Direccion</th>                                                    
                                                <th>Responsable</th>                                                
                                                <th>Contacto</th>
                                                <th>Estado</th>                                                
                                                <th class="text-right">Accion</th>
                                            </tr><!--end tr-->
                                            </thead>
        
                                            <tbody>
                                            <?php
                                            if($proveedores){
                                            $contador=1;
                                            foreach($proveedores->result() as $row){
                                            
                                            ?>
                                            <tr>
                                                <td><?php echo $contador; ?></td>
                                                <td><?php echo $row->nombre; ?></td>
                                                <td><?php echo $row->direccion; ?></td>
                                                <td><?php echo $row->encargado; ?></td>
                                                <td><?php echo $row->contacto; ?></td>
                                                <td><?php echo $row->estado; ?></td>                                                
                                                
                                                <td>
                                                <div style="display: flex; align-items: center;">
                                                    <?php
                                                    echo form_open_multipart("proveedor/modificar");
                                                    ?>
                                                        <input type="hidden" name="idproveedor" value="<?php echo $row->idproveedor; ?>">
                                                        <button type="submit" class="btn btn-success mr-2"><i class="fas fa-pencil-alt"></i></button>
                                                    <?php  
                                                    echo form_close();
                                                    ?>	
                                                    <?php
                                                    echo form_open_multipart("proveedor/eliminarbd");
                                                    ?>
                                                        <input type="hidden" name="idproveedor" value="<?php echo $row->idproveedor; ?>">
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt text-secondary font-16"></i></button>
                                                    <?php  
                                                    echo form_close();
                                                    ?>                                                  
                                                </div> 
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
                    </div><!--end row--> 
    <!-- USD, EUR, other fiat currencies -->
   
    <!--/ USD, EUR, other fiat currencies -->
</div>
          </div>
        </div>
        
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


