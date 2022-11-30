 <!-- [ navigation menu ] start -->
 <nav class="pc-sidebar">
     <div class="navbar-wrapper">
         <div class="m-header">
             <a href="?op=permitido" class="b-brand" style="display: flex; align-items: center;">
                 <!-- ========   change your logo hear   ============ -->
                 <img src="public/images/utp.svg"
                     style="width: 55px;height:auto;background:white;padding:5px; border-radius: 50px; margin-right:15px"
                     alt="" class="logo logo-lg">
                 <h3 style="color:white;padding-top:10px"><span style="color: #6610f2;">UTP</span> ADMIN</h3>
             </a>
         </div>
         <div class="navbar-content">
             <ul class="pc-navbar">


                 <!--Opciones de ADMINISTRADOR -->
                 <?php if($_SESSION["tipo_usuario"]==2){ ?>
                 <li class="pc-item pc-caption">
                     <label>Navegacion</label>
                     <span>UTP ADMIN</span>
                 </li>


                 <li class="pc-item">
                     <a href="?op=permitido" class="pc-link d-flex"><span class="pc-micon"><i
                                 data-feather="home"></i></span><span class="pc-mtext">Home</span></a>
                 </li>

                 <li class="pc-item pc-hasmenu">
                     <a href="#!" class="pc-link d-flex"><span class="pc-micon"><i
                                 data-feather="calendar"></i></span><span class="pc-mtext">Reservación
                         </span>
                         <?php 
$num_Sol=0; 
$SolicitudesPendientes = new Reservas();
$SolicitudesPendientes = $this->modeloReservas->ObtenerReservasActivas();
foreach($SolicitudesPendientes as $listPend){
if($listPend->estado == 1){
$num_Sol++;
}

} if($num_Sol>0){ ?>
                         <main rel="main">
                             <div class="notification">
                                 <svg viewbox="0 0 166 197">
                                     <path
                                         d="M82.8652955,196.898522 C97.8853137,196.898522 110.154225,184.733014 110.154225,169.792619 L55.4909279,169.792619 C55.4909279,184.733014 67.8452774,196.898522 82.8652955,196.898522 L82.8652955,196.898522 Z"
                                         class="notification--bellClapper"></path>
                                     <path
                                         d="M146.189736,135.093562 L146.189736,82.040478 C146.189736,52.1121695 125.723173,27.9861651 97.4598237,21.2550099 L97.4598237,14.4635396 C97.4598237,6.74321823 90.6498186,0 82.8530327,0 C75.0440643,0 68.2462416,6.74321823 68.2462416,14.4635396 L68.2462416,21.2550099 C39.9707102,27.9861651 19.5163297,52.1121695 19.5163297,82.040478 L19.5163297,135.093562 L0,154.418491 L0,164.080956 L165.706065,164.080956 L165.706065,154.418491 L146.189736,135.093562 Z"
                                         class="notification--bell"></path>
                                 </svg>
                                 <!--  <span class="notification--num">5</span> -->
                             </div>

                         </main>
                         <?php } ?>
                         <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                     </a>
                     <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="?op=facultades">Horarios de Salones</a></li>
                        <li class="pc-item"><a class="pc-link" href="?op=solicitudesReservas">Solicitudes de
                                 Reservas &nbsp; 
                                 <?php $num_hc=0; foreach($SolicitudesPendientes as $listPend){if($listPend->estado == 1){ $num_hc++;}}; ?>                       
                                 <?php if($num_hc>0){?><span class="badge bg-primary rounded-pill"> <?php echo $num_hc; ?> </span><?php } ?> </a>
                        </li>

                     </ul>
                 </li>

                 <li class="pc-item">
                     <a href="?op=perfil" class="pc-link d-flex"><span class="pc-micon">
                             <i data-feather="user"></i></span><span class="pc-mtext">Mi Perfil</span></a>
                 </li>

                 <li class="pc-item pc-hasmenu">
                     <a href="#!" class="pc-link d-flex"><span class="pc-micon"><i data-feather="box"></i></span><span
                             class="pc-mtext">Configuración</span><span class="pc-arrow"><i
                                 data-feather="chevron-right"></i></span></a>
                     <ul class="pc-submenu">
                         <li class="pc-item"><a class="pc-link" href="?op=admin">Usuarios</a></li>
                     </ul>
                 </li>

                 <?php }else{?>
                 <!--Opciones de USUARIO -->
                 <li class="pc-item pc-caption">
                     <label>Navegacion</label>
                     <span>UTP USUARIO</span>
                 </li>



                 <li class="pc-item pc-hasmenu">
                     <a href="#!" class="pc-link d-flex"><span class="pc-micon"><i
                                 data-feather="calendar"></i></span><span class="pc-mtext">Reservación</span><span
                             class="pc-arrow">
                             <i data-feather="chevron-right"></i></span></a>
                     <ul class="pc-submenu">
                         <li class="pc-item"><a class="pc-link" href="?op=facultades">Crear reserva</a></li>
                         <li class="pc-item"><a class="pc-link" href="?op=misReservas">Mis Reservas</a></li>

                     </ul>
                 </li>

                 <li class="pc-item">
                     <a href="?op=perfil" class="pc-link d-flex"><span class="pc-micon">
                             <i data-feather="user"></i></span><span class="pc-mtext">Mi Perfil</span></a>
                 </li>
                 <?php } ?>


             </ul>

         </div>
     </div>
 </nav>