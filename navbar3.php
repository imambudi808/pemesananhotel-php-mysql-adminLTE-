<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand"><b>SIGAH</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="10reservasi.php">Reservasi <span class="sr-only">(current)</span></a></li>
            <!-- <li><a href="#">Link</a></li> -->
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li> -->
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">        
            
            <!-- <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">                
                <span>Login</span>
              </a>
              <ul class="dropdown-menu">                                
                <li class="footer">
                  <a href="8loginpegawai.php">Pegawai</a>
                </li>
                <li class="footer">
                  <a href="8logintamu.php">Tamu</a>
                </li>
              </ul>
            </li>  --> 
            <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="8loginpegawai.php" >
              
              <span class="hidden-xs">Admin</span>
            </a>
            <!-- <ul class="dropdown-menu">              
              <li class="user-footer">            
                <div class="pull-left">
                  <a href="8logintamu.php" class="btn btn-default btn-flat">Tamu</a>
                </div>
                
                <div class="pull-right">
                  <a href="8loginpegawai.php" class="btn btn-default btn-flat">Admin</a>
                </div>            
               
              </li>
            </ul> -->            
          </li> 
          <li class="dropdown user user-menu">
            <a href="8logintamu.php">
              
              <span class="hidden-xs">Tamu</span>
            </a>                
          </li> 
           
          <!-- //end            -->
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>