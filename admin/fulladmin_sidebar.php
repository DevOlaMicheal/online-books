   <!-- Sidebar Menu -->
   <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas far fa-user-circle"></i>
              <p>
                Admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="fas fa-address-book nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_staffs.php" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>manage staff's</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="edit_details.php" class="nav-link">
                  <i class="fas fa-tools nav-icon"></i>
                  <p>Edit profile</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
               Students
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"><?php echo $no_va ?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="students.php" class="nav-link">
                  <i class="fas fa-user-friends nav-icon"></i>
                  <p>Registered Students</p>
                </a>
              </li>
              
              
              <li class="nav-item">
                <a href="add_user.php" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>add new</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
               Library
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"><?php echo $no_va ?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="bb..bb.php" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>available Books</p>
                </a>
              </li>
              
              
              <li class="nav-item">
                <a href="upl_book.php" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>add new</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="video_tuts.php" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>available Videos</p>
                </a>
              </li>
              
              
              <li class="nav-item">
                <a href="manage_vids.php" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>add video</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pqanda.php" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>available past questions</p>
                </a>
              </li>
              
              
              <li class="nav-item">
                <a href="add_pqanda.php" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>add new past question</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="requests.php" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Requests
                <span class="right badge badge-danger"><?php echo $no_requests ?></span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>